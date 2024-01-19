        

        @csrf
        @if($project->image)
         <img class="card-img-top mb-2" style="height: 250px; object-fit: cover" src="/storage/{{ $project->image }}" alt="{{ $project->title }}" >
        @endif 


        <div class="custom-file mb-2">
           <input name="image" type="file" class="custom-file-input" id="customFile">
           <label class="custom-file-label" for="customFile">Choose file</label>
        </div>

        <div class="form-group">
            <label for="category_id">Categoría del proyecto</label>
            <select name="category_id" id="category_id" class="form-control border-0 bg-light shadow-sm">
               <option value="">Seleccione</option>
               @foreach($categories as $id => $name)
                  <option value="{{ $id }}" @if($id  == old('category_id', $project->category_id)) selected @endif>{{ $name }}</option>
               @endforeach
            </select>
        </div>



        <div class="form-group">
        <label for="title"> Titulo del proyecto </label>
        <input type="text" class="form-control border-0 bg-light shadow-sm" id="title" name="title" value="{{ old('title', $project->title) }}">
        </div>
        

        <div class="form-group">
        <label> URL del proyecto </label>
        <input type="text" class="form-control border-0 bg-light shadow-sm" id="url" name="url" value="{{ old('url', $project->url) }}">
        </div>

        <div class="form-group">
        <label> Descripcion del proyecto </label>
        <textarea class="form-control border-0 bg-light shadow-sm" name="description">{{ old('description', $project->description) }}</textarea>
        </div>
        

        <button class="btn btn-primary btn-lg btn-block">{{ $btnText }}</button>

        <a class="btn btn-link btn-block" href="{{ route('projects.index') }}">Cancelar</a>