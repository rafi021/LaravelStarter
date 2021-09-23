<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\MenuItemStoreRequest;
use App\Http\Requests\MenuItemUpdateRequest;
use App\Models\Menu;
use App\Models\MenuItem;
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
        //return $menu;
        return view('dashboard.Menus.MenuItems.create', compact('menu'));
    }

    public function itemStore(MenuItemStoreRequest $request, $id)
    {
        Gate::authorize('app.menu-create');
        $menu = Menu::findOrFail($id);
        $menu->menuItems()->create([
            'type' => $request->input('type'),
            'title' => $request->input('title'),
            'divider_title' => $request->input('divider_title'),
            'url' => $request->input('url'),
            'target' => $request->input('target'),
            'icon_class' => $request->input('icon_class'),
        ]);

        $notification = [
            'alert_type' => 'Success',
            'message' => 'Menu Item Added'
        ];
        notify()->info($notification['message'],$notification['alert_type'],"topRight");
        return back()->with($notification);
    }

    public function itemEdit($id, $itemId)
    {
        Gate::authorize('app.menu-edit');
        $menu = Menu::findOrFail($id);
        $menuItem = $menu->menuItems()->findOrFail($itemId);
        return view('dashboard.Menus.MenuItems.create', compact('menu', 'menuItem'));
    }

    public function itemUpdate(MenuItemUpdateRequest $request, $id, $itemId)
    {
        Gate::authorize('app.menu-edit');
        $menu = Menu::findOrFail($id);
        $menuItem = $menu->menuItems()->findOrFail($itemId);
        $menuItem->update([
            'type' => $request->input('type'),
            'title' => $request->input('title'),
            'divider_title' => $request->input('divider_title'),
            'url' => $request->input('url'),
            'target' => $request->input('target'),
            'icon_class' => $request->input('icon_class'),
        ]);

        $notification = [
            'alert_type' => 'Success',
            'message' => 'Menu Item Updated'
        ];
        notify()->info($notification['message'],$notification['alert_type'],"topRight");
        return back()->with($notification);
    }

    public function itemDelete ($id, $itemId)
    {
        Gate::authorize('app.menu-delete');
        Menu::findOrFail($id)
            ->menuItems()
            ->findOrFail($itemId)
            ->delete();

        $notification = [
            'alert_type' => 'Success',
            'message' => 'Menu Item Deleted'
        ];
        notify()->info($notification['message'],$notification['alert_type'],"topRight");
        return back()->with($notification);
    }
}
