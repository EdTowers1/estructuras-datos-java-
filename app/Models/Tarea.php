<?php

namespace App\Models;

use Exception;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EmptyQueueException extends Exception
{
}

class Tarea extends Model
{

    protected $tareas = [];


    public function enqueue($tarea)
    {
        array_push($this->tareas, $tarea);
    }

    public function dequeue(){
        if($this->isEmpty()) {
            throw new EmptyQueueException("La cola de tareas está vacía");
        }
        return array_shift($this->tareas);
    }

    public function peek(){
        return $this->tareas[0] ?? null;
    }

    public function isEmpty(){
        return empty($this->tareas);
    }

    public function size(){
        return count($this->tareas);
    }

    public function todas()
    {
        return $this->items;
    }
}
