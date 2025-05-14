<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Emprendedor;


class EmprendedorController extends Controller
{
    public function index()
    {
        $emprendedores = Emprendedor::all();
        return view('emprendedores.index', compact('emprendedores'));
    }

    public function create()
    {
        return view('emprendedores.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'nombre'  => 'required|string',
            'email'   => 'required|email|unique:emprendedores',
            'telefono'=> 'nullable|string',
        ]);

        Emprendedor::create($data);
        return redirect()->route('emprendedores.index');
    }

    public function edit(Emprendedor $emprendedor)
    {
            return view('emprendedores.edit', compact('emprendedor'));
    }

    public function update(Request $request, Emprendedor $emprendedor)
    {
        $data = $request->validate([
            'nombre'  => 'required|string',
            'email'   => 'required|email|unique:emprendedores,email,'.$emprendedor->id,
            'telefono'=> 'nullable|string',
        ]);

        $emprendedor->update($data);
        return redirect()->route('emprendedores.index');
    }

    public function destroy(Emprendedor $emprendedor)
    {
         $emprendedor->delete();
        return redirect()->route('emprendedores.index');
    }

}