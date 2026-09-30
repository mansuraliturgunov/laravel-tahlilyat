<?php

namespace App\Http\Controllers;

use App\Models\Coment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ComentController extends Controller
{
    public function store(Request $request) {
        $coment = Coment::create([
            'user_id' => Auth::user()->id,
            'post_id' =>$request->post_id,
            'body' => $request->body,
        ]);
        return redirect()->back();
    }
}
