<x-authenticated-layout>

	<form method="POST" action="/dashboard/users/{{$user->id_user}}" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <img src="{{ $user->latestFoto ? asset('storage/'.$user->latestFoto->foto) : asset('user-fotos/default-user-foto.png')}}"  class="img-thumbnail rounded-circle d-block mx-auto s-image-preview" id="imagePreview">
        </div>
        <div class="override form-floating mb-3">
            <input type="file" name="user_foto" class="form-control" accept="image/*" id="user_foto" placeholder="Upload foto">
            <label for="user_foto">Foto</label>
            @error('user_foto')
                <p class="text-danger">{{$message}}</p>
            @enderror
        </div>

        <div class="override override form-floating mb-3">
		    <select name="id_jenis_user" class="form-select" id="id_jenis_user">
		        <option value="1" selected>Admin</option>
		        <option value="2">Normal</option>
		    </select>
		    <label for="id_jenis_user">User Type</label>
		    @error('id_jenis_user')
		        <p class="text-danger">{{$message}}</p>
		    @enderror
		</div>

		<div class="override form-floating mb-3">
		    <input type="text" name="nama_user" class="form-control" id="nama_user" placeholder="Your name" value="{{$user->nama_user}}">
		    <label for="nama_user">Name</label>
		    @error('nama_user')
		        <p class="text-danger">{{$message}}</p>
		    @enderror
		</div>

		<div class="override form-floating mb-3">
		    <input type="text" name="username" class="form-control" id="username" placeholder="Username" value="{{$user->username}}">
		    <label for="username">Username</label>
		    @error('username')
		        <p class="text-danger">{{$message}}</p>
		    @enderror
		</div>

		<div class="override form-floating mb-3">
		    <input type="password" name="password" class="form-control" id="password" placeholder="Password" value="">
		    <label for="password">New Password</label>
		    @error('password')
		        <p class="text-danger">{{$message}}</p>
		    @enderror
		</div>

		<div class="override form-floating mb-3">
		    <input type="password" name="password_confirmation" class="form-control" id="password_confirmation" placeholder="Confirm Password" value="">
		    <label for="password_confirmation">New Confirm Password</label>
		</div>

		<div class="override form-floating mb-3">
		    <input type="email" name="email" class="form-control" id="email" placeholder="name@example.com" value="{{$user->email}}">
		    <label for="email">Email address</label>
		    @error('email')
		        <p class="text-danger">{{$message}}</p>
		    @enderror
		</div>

		<div class="override form-floating mb-3">
		    <input type="text" name="no_hp" class="form-control" id="no_hp" placeholder="Your phone number" value="{{$user->no_hp}}">
		    <label for="no_hp">Phone Number</label>
		    @error('no_hp')
		        <p class="text-danger">{{$message}}</p>
		    @enderror
		</div>

		<div class="override form-floating mb-3">
		    <input type="text" name="wa" class="form-control" id="wa" placeholder="Your WhatsApp number" value="{{$user->wa}}">
		    <label for="wa">WhatsApp Number</label>
		    @error('wa')
		        <p class="text-danger">{{$message}}</p>
		    @enderror
		</div>

		<div class="override form-floating mb-3">
		    <input type="text" name="pin" class="form-control" id="pin" placeholder="Your PIN" value="{{$user->pin}}">
		    <label for="pin">PIN</label>
		    @error('pin')
		        <p class="text-danger">{{$message}}</p>
		    @enderror
		</div>

		<div class="override form-floating mb-3">
		    <input type="text" name="status_user" class="form-control" id="status_user" placeholder="User status" value="{{$user->status_user}}">
		    <label for="status_user">User Status</label>
		    @error('status_user')
		        <p class="text-danger">{{$message}}</p>
		    @enderror
		</div>
		
		<div class="override form-floating mb-3 mt-5">
		    <input type="password" name="old_password" class="form-control" id="old_password" placeholder="Current Password" value="">
		    <label for="old_password">Password</label>
		    @error('old_password')
		        <p class="text-danger">{{$message}}</p>
		    @enderror
		</div>
		<button type="submit" class="btn btn-s" onclick="submitForm(this);">Update</button>
        
    </form>
</x-authenticated-layout>