<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Vinkla\Instagram\Instagram;

class InstagramController extends Controller
{
    public function index()
    {
        //dd(session()->all());
        $instagram = new Instagram();
        $instagrams = $instagram->get('absolem_shop');
        return view('instagrams', [
            'instagrams' => $instagrams
        ]);
    }//
}
