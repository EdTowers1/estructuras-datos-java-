<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ArraysController extends Controller
{
    public function index()
    {

        $apellidos = [
            "Torres",
            "Messi",
            "Maradona",
            "Neymar",
            "Ronaldo"
        ];

        return view('arrays.index', compact('apellidos'));
    }
}
