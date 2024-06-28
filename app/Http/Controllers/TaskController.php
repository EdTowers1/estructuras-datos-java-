<?php

namespace App\Http\Controllers;

use App\Models\Tarea;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    public function index(){

        $tareas = new Tarea();
    }
}
