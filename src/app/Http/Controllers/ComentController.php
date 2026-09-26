<?php

namespace App\Http\Controllers;

use App\Models\Coment;
use Illuminate\Http\Request;

class ComentController extends Controller
{
    public function store(Request $request) {
        $coment = Coment::create([
            'user_id' => 1,
            'post_id' =>$request->post_id,
            'body' => $request->body,
        ]);
        return redirect()->back();
    }
}
