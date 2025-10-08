@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <h1 class="mb-4">Mis Tareas</h1>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul class="mb-0">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form method="POST" action="{{ route('tareas.store') }}" class="card p-3 mb-4">
        @csrf
        <div class="mb-3">
            <input type="text" name="nombre" class="form-control" placeholder="Título de la tarea" required>
        </div>
        <div class="mb-3">
            <textarea name="descripcion" class="form-control" placeholder="Descripción (opcional)"></textarea>
        </div>
        <button type="submit" class="btn btn-primary">Agregar Tarea</button>
    </form>

    @foreach($tareas as $tarea)
        <div class="card mb-2 p-3 {{ $tarea->completada ? 'border-success' : '' }}">
            <h5 class="{{ $tarea->completada ? 'text-success text-decoration-line-through' : '' }}">
                {{ $tarea->nombre }}
            </h5>
            <p>{{ $tarea->descripcion }}</p>

            <div class="d-flex gap-2 flex-wrap">
                <button class="btn btn-sm btn-outline-primary" data-bs-toggle="collapse"
                    data-bs-target="#editar-{{ $tarea->id }}">
                    Editar
                </button>

                <form method="POST" action="{{ route('tareas.toggle', $tarea) }}">
                    @csrf @method('PATCH')
                    <button class="btn btn-sm btn-outline-success">
                        {{ $tarea->completada ? 'Desmarcar' : 'Completar' }}
                    </button>
                </form>

                <form method="POST" action="{{ route('tareas.destroy', $tarea) }}">
                    @csrf @method('DELETE')
                    <button class="btn btn-sm btn-outline-danger">Eliminar</button>
                </form>
            </div>

            <div class="collapse mt-2" id="editar-{{ $tarea->id }}">
                <form method="POST" action="{{ route('tareas.update', $tarea) }}" class="card card-body">
                    @csrf
                    @method('PUT')
                    <div class="mb-2">
                        <input type="text" name="nombre" class="form-control"
                            value="{{ old('nombre', $tarea->nombre) }}" required>
                    </div>
                    <div class="mb-2">
                        <textarea name="descripcion" class="form-control">{{ old('descripcion', $tarea->descripcion) }}</textarea>
                    </div>
                    <button type="submit" class="btn btn-success btn-sm">Guardar cambios</button>
                </form>
            </div>
        </div>
    @endforeach
</div>
@endsection
