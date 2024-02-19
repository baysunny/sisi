<?php

namespace App\Http\Controllers;

use App\Models\Menu;
use App\Models\User;
use App\Models\MenuUser;
use Illuminate\Http\Request;

class MenuUserController extends Controller
{
    public function delete(MenuUser $menuUser)
    {
        return view('dashboard.menu-users.delete', compact('menuUser'));
    }

    public function create(){
        $menus = Menu::orderBy('menu_name')->get();
        $users = User::where('id_jenis_user', '!=', '1')->orderBy('nama_user')->get();
        return view('dashboard.menu-users.create', compact('menus', 'users'));
    }

    public function store(Request $request){
        $fields = $request->validate([
            'id_user' => 'required|string|exists:users,id_user|max:30',
            'menu_id' => 'required|string|exists:menus,menu_id|max:30',
            'created_by' => 'required|string|max:30',
        ]);
        $fields['delete_mark'] = '0';
        MenuUser::create($fields);

        return back()->with('message', 'User successfully added to the Menu');
    }

    public function destroy(MenuUser $menuUser){
        $menuUser->delete();
        return back()->with('message', 'User access to the menu has been deleted');
    }
}
