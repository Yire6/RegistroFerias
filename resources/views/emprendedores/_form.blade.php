{{-- resources/views/emprendedores/_form.blade.php --}}

<div class="mb-3">
  <label class="form-label">Nombre</label>
  <input
    type="text"
    name="nombre"
    value="{{ old('nombre', isset($emprendedor) ? $emprendedor->nombre : '') }}"
    class="form-control">
  @error('nombre') <div class="text-danger">{{ $message }}</div> @enderror
</div>

<div class="mb-3">
  <label class="form-label">Email</label>
  <input
    type="email"
    name="email"
    value="{{ old('email', isset($emprendedor) ? $emprendedor->email : '') }}"
    class="form-control">
  @error('email') <div class="text-danger">{{ $message }}</div> @enderror
</div>

<div class="mb-3">
  <label class="form-label">Teléfono</label>
  <input
    type="text"
    name="telefono"
    value="{{ old('telefono', isset($emprendedor) ? $emprendedor->telefono : '') }}"
    class="form-control">
  @error('telefono') <div class="text-danger">{{ $message }}</div> @enderror
</div>
