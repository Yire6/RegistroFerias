{{-- resources/views/ferias/_form.blade.php --}}

<div class="mb-3">
  <label class="form-label">Nombre</label>
  <input
    type="text"
    name="nombre"
    value="{{ old('nombre', isset($feria) ? $feria->nombre : '') }}"
    class="form-control">
  @error('nombre') <div class="text-danger">{{ $message }}</div> @enderror
</div>

<div class="mb-3">
  <label class="form-label">Descripción</label>
  <textarea
    name="descripcion"
    class="form-control"
  >{{ old('descripcion', isset($feria) ? $feria->descripcion : '') }}</textarea>
  @error('descripcion') <div class="text-danger">{{ $message }}</div> @enderror
</div>

<div class="mb-3">
  <label class="form-label">Fecha</label>
  <input
    type="date"
    name="fecha"
    value="{{ old('fecha', isset($feria) ? $feria->fecha->format('Y-m-d') : '') }}"
    class="form-control">
  @error('fecha') <div class="text-danger">{{ $message }}</div> @enderror
</div>

<div class="mb-3">
  <label class="form-label">Emprendedores</label>
  <select name="emprendedores[]" multiple class="form-select">
    @foreach($emprendedores as $e)
      <option value="{{ $e->id }}"
        {{ (in_array($e->id, old('emprendedores', isset($feria) ? $feria->emprendedores->pluck('id')->toArray() : [])))
            ? 'selected' : '' }}>
        {{ $e->nombre }}
      </option>
    @endforeach
  </select>
  @error('emprendedores') <div class="text-danger">{{ $message }}</div> @enderror
</div>
