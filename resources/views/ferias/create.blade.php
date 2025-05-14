@extends('layouts.app')

@section('content')
<div class="container">
  <h2>Crear Feria</h2>
  <form action="{{ route('ferias.store') }}" method="POST">
    @csrf
    @include('ferias._form')
    <button class="btn btn-success">Guardar</button>
  </form>
</div>
@endsection
