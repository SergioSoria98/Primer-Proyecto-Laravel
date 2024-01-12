        

        @csrf

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