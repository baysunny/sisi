<?php

namespace App\Providers;

use App\Models\Menu;
use App\Models\MenuUser;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use Illuminate\Pagination\Paginator;
class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {   
        Paginator::useBootstrap();
        
        View::composer('*', function ($view) {
            if (auth()->check()) {
                if(auth()->user()->id_jenis_user==1){
                    $menus = Menu::where('parent_id', '=', '0')->orderBy('created_at')->get();
                }else{
                    $menuUsers = MenuUser::where('id_user', '=', auth()->user()->id_user)->get();
                    $menus = $menuUsers->filter(function ($menuUser) {
                        // Filter MenuUser objects where the associated Menu's parent_id is 0
                        return $menuUser->menu->parent_id == 0;
                    })->map(function ($menuUser) {
                        // Map each filtered MenuUser object to its associated Menu object
                        return $menuUser->menu;
                    });
                }
                $view->with('sharedMenus', $menus);
            }
        });

    }
}
