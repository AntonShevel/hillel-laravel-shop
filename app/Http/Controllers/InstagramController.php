<?php

namespace LaravelShop\Http\Controllers;

use Illuminate\Http\Request;
use Vinkla\Instagram\Instagram;

class InstagramController extends Controller
{
    public function index()
    {
    // TODO get images from the DB
        return view('instagrams', [
            'instagrams' => []
        ]);
    }
}
