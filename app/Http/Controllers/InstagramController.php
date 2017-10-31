<?php

namespace LaravelShop\Http\Controllers;

use Vinkla\Instagram\Instagram;

class InstagramController extends Controller
{
    public function index()
    {
        $instagram = new Instagram();
        $instagrams = $instagram->get('absolem_shop');
        return view('instagrams', [
            'instagrams' => $instagrams
        ]);
    }//
}
