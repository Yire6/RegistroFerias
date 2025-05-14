@extends('layouts.app')

@section('content')
<div class="container">
  <h2>Crear Emprendedor</h2>
  <form action="{{ route('emprendedores.store') }}" method="POST">
    @csrf
    @include('emprendedores._form')
    <button class="btn btn-success">Guardar</button>
  </form>
</div>
@endsection
