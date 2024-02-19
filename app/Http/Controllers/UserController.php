<?php

namespace App\Http\Controllers;
use App\Models\User;
use App\Models\UserFoto;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{

    public function create(){
        return view('users.create');
    }

    public function edit(User $user){
        return view('users.edit', compact('user'));
    }

    public function login(){
        return view('users.login');
    }

    public function authenticate(Request $request){
        $formFields = $request->validate([
            'username' => 'required',
            'password' => 'required'
        ]);
        
        if(auth()->attempt($formFields)){
            $request->session()->regenerate();
            return redirect('/dashboard')->with('message', 'You are logged in');
        }

        return back()->withErrors(['username'=>'Invalid Credentials'])->onlyInput('username');
    }

    public function logout(Request $request){
        auth()->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/login')->with('message', 'You have been logged out!');
    }

    public function store(Request $request){
        $fields = $request->validate([
            'nama_user' => 'required|string|max:30',
            'username' => 'required|string|unique:users,username|max:60',
            'email' => 'required|email|unique:users,email|max:60',
            'password' => 'required|string|confirmed|max:60',
            'no_hp' => 'required|string|max:30',
            'wa' => 'required|string|max:30',
            'pin' => 'required|string|max:30',
            'id_jenis_user' => 'required|string|max:3',
            'status_user' => 'required|string|max:30',
            'created_by' => 'required|string|max:30',
        ]);

        $user = User::create([
            'nama_user' => $fields['nama_user'],
            'username' => $fields['username'],
            'email' => $fields['email'],
            'password' => bcrypt($fields['password']),
            'no_hp' => $fields['no_hp'],
            'wa' => $fields['wa'],
            'pin' => $fields['pin'],
            'id_jenis_user' => $fields['id_jenis_user'],
            'status_user' => $fields['status_user'],
            'delete_mark' => '0',
            'created_by' => $fields['created_by'],
        ]);

        if($request->hasFile('user_foto')){
            $filepath = $request->file('user_foto')->store('user-fotos', 'public');
            $user->userFotos()->create([
                'foto' => $filepath,
                'delete_mark' => '0',
                'created_by' => $fields['created_by'],
            ]);

        }

        return redirect('/login')->with('message', 'User created');
    }

    public function update(Request $request, User $user){
        $currentUser = auth()->user();
        $fields = $request->validate([
            'nama_user' => 'required|string|max:30',
            'username' => [
                'required',
                'string',
                'max:60',
                Rule::unique('users', 'username')->ignore($user->id_user, 'id_user'),
            ],
            'email' => [
                'required',
                'email',
                'max:60',
                Rule::unique('users', 'email')->ignore($user->id_user, 'id_user'),
            ],
            'password' => 'required|string|confirmed|max:60',
            'old_password' => [
                'required',
                'string',
                function ($attribute, $value, $fail) use ($user) {
                    if (!Hash::check($value, $user->password)) {
                        $fail('The old password does not match(You enter the wrong password).');
                    }
                },
            ],

            'no_hp' => 'required|string|max:30',
            'wa' => 'required|string|max:30',
            'pin' => 'required|string|max:30',
            'id_jenis_user' => 'required|string|max:3',
        ]);
        $fields['updated_by'] = $currentUser->username;
        $user->update($fields);

        if($request->hasFile('user_foto')){
            $filepath = $request->file('user_foto')->store('user-fotos', 'public');
            $user->userFotos()->create([
                'foto' => $filepath,
                'delete_mark' => '0',
                'created_by' => $currentUser->username,
            ]);

        }
        return back()->with('message', 'User updated successfully');
    }
}
