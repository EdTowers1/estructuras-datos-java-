<?php

namespace App\Http\Controllers;

use App\Models\EmptyQueueException;
use App\Models\Tarea;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    protected $tarea;

    public function __construct()
    {
        $this->tarea = new Tarea();
    }

    public function addTask(Request $request)
    { // esta función agrega una nueva tarea a la cola.
        $tarea = $request->input('tarea');
        $this->tarea->enqueue($tarea);

        return response()->json(['message' => 'Tarea agregada con éxito', 'tareas' => $this->tarea->all()]);
    }

    public function viewTask()
    { // esta función muestra las tareas que están en la cola.

        return response()->json(['tareas' => $this->tarea->all()]);
    }

    public function proccessTask()
    { // esta función procesa las tareas y sino hay ninguna tarea en cola marca el error.
        try {
            $processedTask = $this->tarea->dequeue();

            return response()->json(['message' => 'Tarea procesada con éxito', 'Tarea procesada' => $processedTask, 'Tareas restantes' => $this->tarea->all()]);
        } catch (EmptyQueueException $ex) {

            return response()->json(['error' => $ex->getMessage()], 400);
        }
    }
}
