@extends('layouts.app')

@section('content')
<div class="container">
  <h2>Editar Feria</h2>
  <form action="{{ route('ferias.update', $feria) }}" method="POST">
    @csrf @method('PUT')
    @include('ferias._form')
    <button class="btn btn-primary">Actualizar</button>
  </form>
</div>
@endsection
