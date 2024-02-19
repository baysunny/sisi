<?php

namespace App\Http\Controllers;
use App\Models\MenuLevel;
use Illuminate\Http\Request;

class MenuLevelController extends Controller
{

    public function index(){
        return view('dashboard.menu-levels.index', [
            'menuLevels' => MenuLevel::paginate(6)
        ]);
    }

    public function create(){
        return view('dashboard.menu-levels.create');
    }

    public function edit(MenuLevel $menuLevel)
    {
        return view('dashboard.menu-levels.edit', compact('menuLevel'));
    }

    public function delete(MenuLevel $menuLevel)
    {
        return view('dashboard.menu-levels.delete', compact('menuLevel'));
    }

    public function store(Request $request){

        $fields = $request->validate([
            'level' => 'required|string|max:60',
            'created_by' => 'required|string|max:30',
        ]);
        $fields['delete_mark'] = '0';
        MenuLevel::create($fields);

        return redirect('/dashboard/menu-levels')->with('message', 'Menu level created');
    }

    public function update(Request $request, MenuLevel $menuLevel)
    {    
        $fields = $request->validate([
            'level' => 'required|string|max:60',
            'updated_by' => 'required|string|max:30',
        ]);
        $menuLevel->update($fields);
        return redirect('/dashboard/menu-levels')->with('message', 'Menu level updated successfully');
    }

    public function destroy(MenuLevel $menuLevel){
        $menuLevel->delete();
        return redirect('/dashboard/menu-levels')->with('message', 'Menu level deleted successfully');
    }
}
