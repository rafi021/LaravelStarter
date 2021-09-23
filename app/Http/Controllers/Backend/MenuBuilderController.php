<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Menu;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class MenuBuilderController extends Controller
{
    public function index($id)
    {
        Gate::authorize('app.menu-index');
        $menu = Menu::findOrFail($id);
        $menuItems = $menu->menuItems;
        return view('dashboard.Menus.builder', compact('menu', 'menuItems'));
    }

    public function itemCreate($id)
    {
        Gate::authorize('app.menu-create');
        $menu = Menu::findOrFail($id);
        $menuItems = $menu->menuItems;
        //return $menu;
        return view('dashboard.Menus.MenuItems.create', compact('menu', 'menuItems'));
    }
}
