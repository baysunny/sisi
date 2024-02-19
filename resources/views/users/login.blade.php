<x-layout>
    @foreach([] as $menu)
        <h1>{{$menu->menu_name}}</h1>
    @endforeach
	<x-card title="Sign in">
		<form method="POST" action="/users/authenticate">
            @csrf
            <div class="override form-floating mb-3">
                <input type="text" name="username" class="form-control" id="username" placeholder="Username" value="baysunny">
                <label for="username">Username</label>
                @error('username')
                    <p class="text-danger">{{$message}}</p>
                @enderror
            </div>
            <div class="override form-floating mb-3">
                <input type="password" name="password" class="form-control" id="password" placeholder="Password" value="baysunny">
                <label for="password">Password</label>
                @error('password')
                    <p class="text-danger">{{$message}}</p>
                @enderror
            </div>
            <button type="submit" class="btn btn-s" onclick="submitForm(this);">Sign in</button>
            
            <div class="mt-3">
                <p>
                    Dont have an account?
                    <a href="/register" class="text-primary">Sign up</a>
                </p>
            </div>
        </form>
	</x-card>
</x-layout>