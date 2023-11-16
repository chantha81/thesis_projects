<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CarouselController extends Controller
{
    public function carousel(Request $request)
    {
        $data = Post::get();
        return response()->json($data);
    }
}
