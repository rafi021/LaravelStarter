<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Page;
use Illuminate\Http\Request;

class PageController extends Controller
{
    public function index($slug)
    {
        //return $slug;
        return $page = Page::findBySlug($slug);
    }
}
