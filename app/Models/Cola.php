<?php

namespace App\Models;

use Exception;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EmptyQueueException extends Exception {}

class Cola extends Model
{
    protected $items = [];


    //Enqueue: se utiliza para añadir un elemento al final de la cola
    public function enqueue($item)
    {
        array_push($this->items, $item);
    }

    // Dequeue: se utiliza para eliminar y retornar el primer elemento de la cola
    public function dequeue()
    {
        if ($this->isEmpty()) {
            throw new EmptyQueueException("La cola está vacía.");
        }
        return array_shift($this->items);
    }

    // Peek: se utiliza para obtener el primer elemento de la cola sin eliminarlo
    public function peek()
    {
        return $this->items[0] ?? null;
    }

    // isEmpty: se verifica si la cola está vacía
    public function isEmpty()
    {
        return empty($this->items);
    }

    // size: Obtener el tamaño de la cola vendrpia siendo similar al .lenght
    public function size()
    {
        return count($this->items);
    }
}
