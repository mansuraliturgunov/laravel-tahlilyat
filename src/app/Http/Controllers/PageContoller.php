<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PageContoller extends Controller
{
    public function index() {
        return view('main');
    }
    // public function blog() {
    //     return view('posts.index');
    // }
    public function about() {
        return view('about');
    }
}
