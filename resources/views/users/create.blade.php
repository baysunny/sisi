<x-layout>
    <x-card title="Sign up">
        <form method="POST" action="/users" enctype="multipart/form-data">
            @csrf
            <div class="mb-3">
                <img src="{{asset('user-fotos/default-user-foto.png')}}" class="img-thumbnail rounded-circle d-block mx-auto s-image-preview" id="imagePreview">
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
                    <option value="1">Admin</option>
                    <option value="2">Normal</option>
                </select>
                <label for="id_jenis_user">User Type</label>
                @error('id_jenis_user')
                    <p class="text-danger">{{$message}}</p>
                @enderror
            </div>

            <div class="override form-floating mb-3">
                <input type="text" name="nama_user" class="form-control" id="nama_user" placeholder="Your name" value="baysunny">
                <label for="nama_user">Name</label>
                @error('nama_user')
                    <p class="text-danger">{{$message}}</p>
                @enderror
            </div>

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

            <div class="override form-floating mb-3">
                <input type="password" name="password_confirmation" class="form-control" id="password_confirmation" placeholder="Confirm Password" value="baysunny">
                <label for="password_confirmation">Confirm Password</label>
            </div>

            <div class="override form-floating mb-3">
                <input type="email" name="email" class="form-control" id="email" placeholder="name@example.com" value="baysunny@gmail.com">
                <label for="email">Email address</label>
                @error('email')
                    <p class="text-danger">{{$message}}</p>
                @enderror
            </div>

            <div class="override form-floating mb-3">
                <input type="text" name="no_hp" class="form-control" id="no_hp" placeholder="Your phone number" value="1234567890">
                <label for="no_hp">Phone Number</label>
                @error('no_hp')
                    <p class="text-danger">{{$message}}</p>
                @enderror
            </div>

            <div class="override form-floating mb-3">
                <input type="text" name="wa" class="form-control" id="wa" placeholder="Your WhatsApp number" value="1234567890">
                <label for="wa">WhatsApp Number</label>
                @error('wa')
                    <p class="text-danger">{{$message}}</p>
                @enderror
            </div>

            <div class="override form-floating mb-3">
                <input type="text" name="pin" class="form-control" id="pin" placeholder="Your PIN" value="1234">
                <label for="pin">PIN</label>
                @error('pin')
                    <p class="text-danger">{{$message}}</p>
                @enderror
            </div>

            <div class="override form-floating mb-3">
                <input type="text" name="status_user" class="form-control" id="status_user" placeholder="User status" value="Active">
                <label for="status_user">User Status</label>
                @error('status_user')
                    <p class="text-danger">{{$message}}</p>
                @enderror
            </div>

            <div class="override form-floating mb-3 d-none">
                <input type="text" name="created_by" class="form-control" id="created_by" placeholder="Created by" value="system">
                <label for="created_by">Created By</label>
            </div>

            <button type="submit" class="btn btn-s" onclick="submitForm(this);">Sign Up</button>
            
            <div class="mt-3">
                <p>
                    Already have an account?
                    <a href="/login" class="text-primary">Sign in</a>
                </p>
            </div>
        </form>
    </x-card>
</x-layout>
