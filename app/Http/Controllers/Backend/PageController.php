<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\PageStoreRequest;
use App\Http\Requests\PageUpdateRequest;
use App\Models\Page;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class PageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        Gate::authorize('app.page-index');
        $pages = Page::latest('id')->get();
        return view('dashboard.PageBuilder.index', compact(
            'pages',
        ));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        Gate::authorize('app.page-index');
        return view('dashboard.PageBuilder.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PageStoreRequest $request)
    {
        //dd($request->all());
        Gate::authorize('app.page-create');
        $page = Page::create([
            'page_title' => $request->input('page_title'),
            'page_slug' => $request->input('page_slug'),
            'excerpt' => $request->input('excerpt'),
            'body' => $request->input('body'),
            'meta_title' => $request->input('meta_title'),
            'meta_keywords' => $request->input('meta_keywords'),
            'meta_description' => $request->input('meta_description'),
            'status' => $request->filled('status'),
        ]);

        // Check if file exits (Image Upload)
        if($request->hasFile('page_image')){
            $page->addMedia($request->page_image)->toMediaCollection('page_image');
        }

        $notification = [
            'alert_type' => 'Success',
            'message' => 'Page Created Successfully!!'
        ];
        notify()->success($notification['message'],$notification['alert_type'],"topRight");
        return redirect()->route('pages.index')->with($notification);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Page  $page
     * @return \Illuminate\Http\Response
     */
    public function show(Page $page)
    {
        Gate::authorize('app.page-edit');
        return view('dashboard.PageBuilder.create', compact('page'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Page  $page
     * @return \Illuminate\Http\Response
     */
    public function edit(Page $page)
    {
        Gate::authorize('app.page-edit');
        return view('dashboard.PageBuilder.create', compact('page'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Page  $page
     * @return \Illuminate\Http\Response
     */
    public function update(PageUpdateRequest $request, Page $page)
    {
        //dd($request->all());
        Gate::authorize('app.page-edit');
        $page->update([
            'page_title' => $request->input('page_title'),
            'page_slug' => $request->input('page_slug'),
            'excerpt' => $request->input('excerpt'),
            'body' => $request->input('body'),
            'meta_title' => $request->input('meta_title'),
            'meta_keywords' => $request->input('meta_keywords'),
            'meta_description' => $request->input('meta_description'),
            'status' => $request->filled('status'),
        ]);

        // Check if file exits (Image Upload)
        if($request->hasFile('page_image')){
            $page->addMedia($request->page_image)->toMediaCollection('page_image');
        }

        $notification = [
            'alert_type' => 'Success',
            'message' => 'Page Updated Successfully!!'
        ];
        notify()->info($notification['message'],$notification['alert_type'],"topRight");
        return redirect()->route('pages.index')->with($notification);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Page  $page
     * @return \Illuminate\Http\Response
     */
    public function destroy(Page $page)
    {
        Gate::authorize('app.page-delete');
        $page->delete();
        $notification = [
            'alert_type' => 'Success',
            'message' => 'Page deleted successfully!!'
        ];
        notify()->error($notification['message'],$notification['alert_type'],"topRight");
        return redirect()->route('pages.index')->with($notification);
    }
}
