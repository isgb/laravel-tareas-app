<?php

namespace App\Http\Controllers;

use App\Models\Tareas;
use App\Http\Requests\TareaRequest;
use Illuminate\Http\Request;

class TareasController extends Controller
{
    // public function index()
    // {
    //     $tareas = Tareas::orderByDesc('created_at')->get();
    //     return view('tareas.index', compact('tareas'));
    // }

    public function index()
    {
        $tareas = auth()->user()->tareas()->latest()->get();
        return view('tareas.index', compact('tareas'));
    }


    public function store(TareaRequest $request)
    {
        $tarea = new Tareas($request->validated());
        $tarea->user_id = auth()->id();
        $tarea->save();

        return redirect()->route('tareas.index')->with('success', 'Tarea creada.');
    }


    public function update(TareaRequest $request, Tareas $tarea)
    {
        $tarea->update($request->validated());
        return redirect()->route('tareas.index')->with('success', 'Tarea actualizada exitosamente.');
    }

    public function destroy(Tareas $tarea)
    {
        $tarea->delete();
        return redirect()->route('tareas.index')->with('success', 'Tarea eliminada exitosamente.');
    }

    public function toggle(Tareas $tarea)
    {
        $tarea->completada = !$tarea->completada;
        $tarea->save();
        return redirect()->route(route: 'tareas.index')->with('success', 'Estado de la tarea actualizado.');
    }
}
