Delete menu level : <strong>{{$menuLevel->level}}</strong> / ID Level : <strong>{{$menuLevel->id_level}}</strong>
<form action="/dashboard/menu-levels/{{$menuLevel->id_level}}" class="form-floating mt-4" method="POST">
    @csrf
    @method('DELETE')
    <button type="button" class="btn btn-danger mt-2" onclick="submitForm(this);">Delete</button>
</form>