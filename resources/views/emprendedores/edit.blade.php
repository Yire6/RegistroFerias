@extends('layouts.app')

@section('content')
<div class="container">
  <h2>Editar Emprendedor</h2>
  {{-- 2) Aquí debe existir la variable $emprendedor --}}

  
<form action="{{ route('emprendedores.update', $emprendedor) }}" method="POST">
  @csrf
  @method('PUT')
  @include('emprendedores._form')
  <button class="btn btn-primary">Actualizar</button>
</form>

</div>
@endsection
