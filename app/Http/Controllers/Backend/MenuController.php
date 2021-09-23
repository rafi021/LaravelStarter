<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\MenuStoreRequest;
use App\Http\Requests\MenuUpdateRequest;
use App\Models\Menu;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Str;

class MenuController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        Gate::authorize('app.menu-index');
        $menus = Menu::latest('id')->get();
        return view('dashboard.Menus.index', compact('menus'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        Gate::authorize('app.menu-create');
        return view('dashboard.Menus.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(MenuStoreRequest $request)
    {
        Gate::authorize('app.menu-create');
        Menu::create([
            'name' =>Str::slug($request->input('name')),
            'description' =>$request->input('description'),
            'deletable' => true,
        ]);

        $notification = [
            'alert_type' => 'Success',
            'message' => 'Menu Created Successfully!!'
        ];
        notify()->success($notification['message'],$notification['alert_type'],"topRight");
        return redirect()->route('menus.index')->with($notification);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Menu  $menu
     * @return \Illuminate\Http\Response
     */
    public function show(Menu $menu)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Menu  $menu
     * @return \Illuminate\Http\Response
     */
    public function edit(Menu $menu)
    {
        Gate::authorize('app.menu-edit');
        return view('dashboard.Menus.create', compact('menu'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Menu  $menu
     * @return \Illuminate\Http\Response
     */
    public function update(MenuUpdateRequest $request, Menu $menu)
    {
        Gate::authorize('app.menu-edit');
        $menu->update([
            'name' =>Str::slug($request->input('name')),
            'description' =>$request->input('description'),
            'deletable' => true,
        ]);

        $notification = [
            'alert_type' => 'Success',
            'message' => 'Menu Updated Successfully!!'
        ];
        notify()->info($notification['message'],$notification['alert_type'],"topRight");
        return redirect()->route('menus.index')->with($notification);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Menu  $menu
     * @return \Illuminate\Http\Response
     */
    public function destroy(Menu $menu)
    {
        Gate::authorize('app.menu-delete');
        if($menu->deletable == true)
        {
            $menu->delete();
            $notification = [
                'alert_type' => 'Success',
                'message' => 'Menu deleted successfully!!'
            ];
            notify()->info($notification['message'],$notification['alert_type'],"topRight");
            return redirect()->route('menus.index')->with($notification);
        }else{
            $notification = [
                'alert_type' => 'Danger',
                'message' => "You can't delete this menu!!!"
            ];
            notify()->warning($notification['message'],$notification['alert_type'],"topRight");
            return redirect()->route('menus.index')->with($notification);
        }
    }
}
