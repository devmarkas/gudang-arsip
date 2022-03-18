<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HcmController extends Controller
{
    public function index()
    {
        return view('admin.hcm.index');
    }
}
