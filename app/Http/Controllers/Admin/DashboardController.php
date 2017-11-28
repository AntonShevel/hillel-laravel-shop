<?php

namespace LaravelShop\Http\Controllers\Admin;

use LaravelShop\Http\Controllers\Controller;


class DashboardController extends Controller
{
    public function show()
    {
        return view('admin.dashboard');
    }
}
