<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CommerceController extends Controller
{
    public function index()
    {
        return view('admin.commerce.index');
    }
}
