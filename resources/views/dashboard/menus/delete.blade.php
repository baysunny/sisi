Delete menu : <strong>{{$menu->menu_name}}</strong> / Menu ID : <strong>{{$menu->menu_id}}</strong>
<form action="/dashboard/menus/{{$menu->menu_id}}" class="form-floating mt-4" method="POST">
    @csrf
    @method('DELETE')
    <button type="button" class="btn btn-danger mt-2" onclick="submitForm(this);">Delete</button>
</form>