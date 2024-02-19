<!-- <x-authenticated-layout> -->
<form action="/dashboard/menu-users" class="override form-floating mt-4" method="POST">
    @csrf
    <div class="override form-floating mb-3">
        <select name="menu_id" class="form-select" id="menu_id">
            @foreach($menus as $menu)
            <option value="{{ $menu->menu_id }}" >{{ $menu->menu_name }}</option>
            @endforeach
        </select>
        <label for="menu_id">Menu</label>
        @error('menu_id')
            <p class="text-danger">{{$message}}</p>
        @enderror
    </div>

    <div class="override form-floating mb-3">
        <select name="id_user" class="form-select" id="id_user">
            @foreach($users as $user)
            <option value="{{ $user->id_user }}">{{ $user->username }}</option>
            @endforeach
        </select>
        <label for="id_user">User</label>
        @error('id_user')
            <p class="text-danger">{{$message}}</p>
        @enderror
    </div>

    <input type="text" class="d-none" name="created_by" value="{{auth()->user()->username}}">
    <button type="submit" class="btn btn-primary" onclick="submitForm(this);">Add</button>
</form>
<!-- </x-authenticated-layout> -->