@extends('layouts.app')

@section('content')
<div class="container">
  <h2>Listado de Emprendedores</h2>
  <a href="{{ route('emprendedores.create') }}" class="btn btn-primary mb-3">Crear Nuevo</a>
  <table class="table table-bordered">
    <thead>
      <tr>
        <th>ID</th>
        <th>Nombre</th>
        <th>Email</th>
        <th>Teléfono</th>
        <th>Acciones</th>
      </tr>
    </thead>
    <tbody>
      @foreach($emprendedores as $e)
      <tr>
        {{-- 1) Asegúrate de mostrar cada campo en su propia celda --}}
        <td>{{ $e->id }}</td>
        <td>{{ $e->nombre }}</td>
        <td>{{ $e->email }}</td>
        <td>{{ $e->telefono }}</td>

        {{-- 2) Y las acciones al final --}}
        <td>
          <a href="{{ route('emprendedores.edit', $e) }}" class="btn btn-sm btn-warning">Editar</a>
          <form action="{{ route('emprendedores.destroy', $e) }}" method="POST" class="d-inline">
            @csrf
            @method('DELETE')
            <button class="btn btn-sm btn-danger" onclick="return confirm('¿Borrar este emprendedor?')">Borrar</button>
          </form>
        </td>
      </tr>
      @endforeach
    </tbody>
  </table>
</div>
@endsection
