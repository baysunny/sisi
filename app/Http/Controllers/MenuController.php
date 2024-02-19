<?php

namespace App\Http\Controllers;
use App\Models\Menu;
use App\Models\MenuLevel;
use App\Models\MenuUser;
use Illuminate\Http\Request;

class MenuController extends Controller
{
    public function index(){

        $menus = Menu::paginate(6);
        return view('dashboard.menus.index', compact('menus'));
    }

    public function show(Menu $menu){
        $menuUsers = MenuUser::where('menu_id', '=', $menu->menu_id)->paginate(6, ['*'], 'list-user');
        $subMenus = Menu::where('parent_id', '=', $menu->menu_id)->orderBy('created_at')->paginate(6, ['*'], 'sub-menu');

        if(auth()->user()->id_jenis_user!=1){
            $currentUser = auth()->user();
            $subMenus = Menu::where('parent_id', '=', $menu->menu_id)
                ->whereHas('menuUsers', function($query) use ($currentUser) {
                    $query->where('id_user', $currentUser->id_user);
                })
                    ->orderBy('created_at')
                    ->get();
        }

        return view('dashboard.menus.show', compact('menu', 'subMenus', 'menuUsers'));
    }

    public function create(){
        $menuLevels = MenuLevel::all();
        $menus = Menu::all();
        return view('dashboard.menus.create', compact('menuLevels', 'menus'));
    }

    public function edit(Menu $menu)
    {
        // dd($menu);
        $menuLevels = MenuLevel::all();
        $menus = Menu::where('menu_id', '!=', $menu->menu_id)->get();
        return view('dashboard.menus.edit', compact('menuLevels', 'menus', 'menu'));
    }

    public function delete(menu $menu)
    {
        return view('dashboard.menus.delete', compact('menu'));
    }

    public function store(Request $request){

        $fields = $request->validate([
            'id_level' => 'required|string|exists:menu_levels,id_level|max:30',
            'menu_name' => 'required|string|max:300',
            'menu_link' => 'required|string|max:300',
            'parent_id' => 'required|string|max:30',
            'created_by' => 'required|string|max:30',
        ]);
        if($request->hasFile('menu_icon')){
            $fields['menu_icon'] = $request->file('menu_icon')->store('icons', 'public');
        }else{
            $fields['menu_icon'] = Null;
        }
        Menu::create([
            'id_level' => $fields['id_level'],
            'menu_name' => $fields['menu_name'],
            'menu_link' => $fields['menu_link'],
            'menu_icon' => $fields['menu_icon'],
            'parent_id' => $fields['parent_id'],
            
            'delete_mark' => '0',
            'created_by' => $fields['created_by'],
        ]);

        return redirect('/dashboard/menus')->with('message', 'Menu created');
    }

    public function update(Request $request, menu $menu)
    {    
        $fields = $request->validate([
            'id_level' => 'required|string|exists:menu_levels,id_level|max:30',
            'menu_name' => 'required|string|max:300',
            'menu_link' => 'required|string|max:300',
            'parent_id' => 'required|string|max:30',
            'updated_by' => 'required|string|max:30',
        ]);
        if($request->hasFile('menu_icon')){
            $fields['menu_icon'] = $request->file('menu_icon')->store('icons', 'public');
        }
        $menu->update($fields);
        return redirect('/dashboard/menus')->with('message', 'Menu updated successfully');
    }

    public function destroy(menu $menu){
        $menu->delete();
        return redirect('/dashboard/menus')->with('message', 'Menu deleted successfully');
    }
}
