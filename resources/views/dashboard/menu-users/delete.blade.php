Delete access user : <strong>{{$menuUser->user->username}}</strong> from menu : <strong>{{$menuUser->menu->menu_name}}</strong>
<form action="/dashboard/menu-users/{{$menuUser->no_setting}}" class="form-floating mt-4" method="POST">
    @csrf
    @method('DELETE')
    <button type="button" class="btn btn-danger mt-2" onclick="submitForm(this);">Delete</button>
</form>