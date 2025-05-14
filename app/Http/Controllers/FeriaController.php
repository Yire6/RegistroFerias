<?php

namespace App\Http\Controllers;

use App\Models\Feria;
use App\Models\Emprendedor;
use Illuminate\Http\Request;

class FeriaController extends Controller
{
    // 1. Listar todas las ferias
    public function index()
    {
        $ferias = Feria::with('emprendedores')->get();
        return view('ferias.index', compact('ferias'));
    }

    // 2. Mostrar formulario de creación
    public function create()
    {
        $emprendedores = Emprendedor::all();
        return view('ferias.create', compact('emprendedores'));
    }

    // 3. Guardar nueva feria
    public function store(Request $request)
{
    $data = $request->validate([
      'nombre'      => 'required|string',
      'descripcion' => 'nullable|string',
      'fecha'       => 'required|date',
      'emprendedores' => 'required|array',
      'emprendedores.*' => 'exists:emprendedores,id',
    ]);

    /** 1) Crear la feria **/
    $feria = Feria::create($data);

    /** 2) Sincronizar pivot **/
    $feria->emprendedores()->sync($data['emprendedores']);

    return redirect()->route('ferias.index');
}

    // 4. Mostrar formulario de edición
    public function edit(Feria $feria)
    {
        $emprendedores = Emprendedor::all();
        return view('ferias.edit', compact('feria','emprendedores'));
    }

    // 5. Actualizar feria existente
    public function update(Request $request, Feria $feria)
    {
        $data = $request->validate([
            'nombre'       => 'required|string',
            'descripcion'  => 'nullable|string',
            'fecha'        => 'required|date',
            'emprendedores'=> 'array',
        ]);

        $feria->update($data);
        $feria->emprendedores()->sync($data['emprendedores'] ?? []);
        return redirect()->route('ferias.index');
    }

    // 6. Borrar feria
    public function destroy(Feria $feria)
    {
        $feria->delete();
        return redirect()->route('ferias.index');
    }
}