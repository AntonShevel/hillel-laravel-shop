<?php

namespace LaravelShop\Http\Controllers;

use Illuminate\Http\Request;
use Vinkla\Instagram\Instagram;
use DB;

class InstagramController extends Controller
{
    public function index()
    {
        $images =  DB::select('select * from instagram_images');
        return view('instagrams', [
            'instagrams' => $images
        ]);
    }
}
