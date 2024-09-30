<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class JefesController extends Controller
{
    public function index()
    {
        return view('jefes.index');
    }
}
