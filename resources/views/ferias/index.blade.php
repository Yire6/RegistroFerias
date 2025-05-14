@extends('layouts.app')

@section('content')
<div class="container">
  <h2>Listado de Ferias</h2>
  <a href="{{ route('ferias.create') }}" class="btn btn-primary mb-3">Crear Nueva Feria</a>
  <table class="table table-bordered">
    <thead>
      <tr>
        <th>ID</th>
        <th>Nombre</th>
        <th>Fecha</th>
        <th>Emprendedores</th>
        <th>Acciones</th>
      </tr>
    </thead>
    <tbody>
      @foreach($ferias as $feria)
      <tr>
        <td>{{ $feria->id }}</td>
        <td>{{ $feria->nombre }}</td>
        <td>{{ $feria->fecha->format('Y-m-d') }}</td>
        <td>
          @foreach($feria->emprendedores as $e)
            <span class="badge bg-secondary">{{ $e->nombre }}</span>
          @endforeach
        </td>
        <td>
          <a href="{{ route('ferias.edit', $feria) }}" class="btn btn-sm btn-warning">Editar</a>
          <form action="{{ route('ferias.destroy', $feria) }}" method="POST" class="d-inline">
            @csrf @method('DELETE')
            <button class="btn btn-sm btn-danger" onclick="return confirm('¿Borrar feria?')">Borrar</button>
          </form>
        </td>
      </tr>
      @endforeach
    </tbody>
  </table>
</div>
@endsection
