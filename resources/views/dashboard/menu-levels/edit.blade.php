<form action="/dashboard/menu-levels/{{$menuLevel->id_level}}" class="override form-floating mt-4" method="POST">
    @csrf
    @method('PUT')
    <div class="override form-floating mb-3">
        <input type="text" class="form-control" id="floatingLevel" name="level" value="{{$menuLevel->level}}" placeholder="Level">
        <label for="floatingLevel">Level</label>
        @error('level')
        <p class="text-danger px-1"><i class="fa fa-exclamation-triangle"></i> {{ $message }}</p>
        @enderror
    </div>

    <input type="text" class="d-none" name="updated_by" value="{{auth()->user()->username}}">
    <button type="submit" class="btn btn-success" onclick="submitForm(this);">Update</button>
</form>