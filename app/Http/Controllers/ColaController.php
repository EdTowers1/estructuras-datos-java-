<?php

namespace App\Http\Controllers;

use App\Models\Cola;
use App\Models\EmptyQueueException as ModelsEmptyQueueException;
use Illuminate\Http\Request;


class ColaController extends Controller
{
    public function index()
    {

        $cola = new Cola();

        $cola->enqueue('primero');
        $cola->enqueue('segundo');
        $cola->enqueue('tercero');

        // en este try catch se busca el primer registro de la cola y se elimina
        try {
            $firstOut = $cola->dequeue();
        } catch (ModelsEmptyQueueException $e) {
            return response()->json(['error' => $e->getMessage()], 400);
        }

        $nextInLine = $cola->peek();
        $colaSize = $cola->size();

        return response()->json([
            'first_out' => $firstOut,
            'next_in_line' => $nextInLine,
            'cola_size' => $colaSize,
        ]);
    }
}
