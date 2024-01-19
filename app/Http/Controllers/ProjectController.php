<?php

namespace App\Http\Controllers;


use App\Models\Project;
use Illuminate\Http\Request;
use Intervention\Image\ImageManager;
use Intervention\Image\Drivers\Gd\Driver;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\SaveProjectRequest;
use App\Models\Category;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     */





    public function  __invoke()
    {

        return view('projects.index', [
            'newProject' => new Project,
            'projects' => Project::with('category')->latest()->paginate(),
            'deletedProjects' => Project::onlyTrashed()->get()
        ]);
        
    }


    public function show(Project $project)
    {
        return view('projects.show', [
            'project' => $project
        ]);

    }


    public function create()
    {
        $this->authorize('create', $project = new Project);

        return view('projects.create', [
            'project' => $project,
            'categories' => Category::pluck('name', 'id')
        ]);
    }


    public function store(SaveProjectRequest $request)
    {
        
        
        $project = new Project( $request->validated() );

        $this->authorize('create', $project);

        $project->image = $request->file('image')->store('images','public');

        $project->save();

        $manager = new ImageManager(new Driver());

        $image = $manager->read(storage_path('app/public/' . $project->image))->scale(width: 300)->reduceColors(16);
        $encoded = $image->toJpeg(60);

        Storage::put($project->image, (string) $encoded);


        return redirect()->route('projects.index');
    }

    public function edit (Project $project){

        $this->authorize('update', $project);

        return view('projects.edit', [
            'project' => $project,
            'categories' => Category::pluck('name', 'id')
        ]);
    }

    public function update(Project $project, SaveProjectRequest $request){

        $this->authorize('update', $project);

        if ( $request->hasFile('image') ){

            
            $project->fill( $request->validated() );

            $project->image = $request->file('image')->store('images','public');

            $project->save();


            $manager = new ImageManager(new Driver());

            $image = $manager->read(storage_path('app/public/' . $project->image))->scale(width: 300)->reduceColors(16);
            $encoded = $image->toJpeg(60);

            Storage::put($project->image, (string) $encoded);

        }

        else{

            $project->update( array_filter( $request->validated()) );
        }

       

        return redirect()->route('projects.show', $project);
    }

    public function destroy(Project $project){

        $this->authorize('delete', $project);


        $project->delete();

        return redirect()->route('projects.index');
    }

    public function restore($projectUrl){

        $project = Project::withTrashed()->whereUrl($projectUrl)->firstOrFail();

        $this->authorize('restore', $project);

        $project->restore();

        return redirect()->route('projects.index');
    }


    public function ForceDelete($projectUrl)
    {
        $project = Project::withTrashed()->whereUrl($projectUrl)->firstOrFail();

        $this->authorize('forceDelete', $project);


        Storage::delete($project->image);

        
        $project->forceDelete();

        return redirect()->route('projects.index');
    }




}
