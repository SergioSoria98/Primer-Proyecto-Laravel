<?php

namespace App\Http\Controllers;


use App\Models\Project;
use App\Http\Requests\SaveProjectRequest;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     */





    public function  __invoke()
    {

        return view('projects.index', [
            'projects' => Project::latest()->paginate()
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
        return view('projects.create', [
            'project' => new Project
        ]);
    }


    public function store(SaveProjectRequest $request)
    {
        
        Project::create( $request->all() );

        return redirect()->route('projects.index');
    }

    public function edit (Project $project){

        return view('projects.edit', [
            'project' => $project
        ]);
    }

    public function update(Project $project, SaveProjectRequest $request){

        $project->update( $request->validated());

        return redirect()->route('projects.show', $project);
    }

    public function destroy(Project $project){

        $project->delete();

        return redirect()->route('projects.index');
    }
}
