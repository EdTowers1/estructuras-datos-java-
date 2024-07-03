<?php

namespace App\Services;

use Exception;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Session;

class EmptyQueueException extends Exception
{
}

class Tarea
{

    protected $tareas = [];


    public function enqueue($tarea)
    {
        array_push($this->tareas, $tarea);
        Session::put('tareas', $this->tareas);
    }

    public function dequeue()
    {
        if ($this->isEmpty()) {
            throw new EmptyQueueException("La cola de tareas está vacía");
        }
        $task = array_shift($this->tareas);
        Session::put('tareas', $this->tareas);
        return $task;
    }

    public function peek()
    {
        return $this->tareas[0] ?? null;
    }

    public function isEmpty()
    {
        return empty($this->tareas);
    }

    public function size()
    {
        return count($this->tareas);
    }

    public function all()
    {
        // dump($this->tareas);


        return $this->tareas;
    }
}
