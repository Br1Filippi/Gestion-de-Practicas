<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SecretariasController extends Controller
{
    public function index()
    {
        return view('secretarias.index');
    }
}
