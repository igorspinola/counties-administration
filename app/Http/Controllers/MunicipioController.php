<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;

use Illuminate\Http\Request;

use App\Models\Municipio;

class MunicipioController extends Controller
{

    // public function store() 
    // {
    //     $path = request()->file('Brasao')->store('imagens');
    // }
    public function create(Request $request)
    {
        if (Auth::check()) {
        
         $this->validate($request, [
        'Nome' => 'required',
        'CNPJ' => 'required',
        'CodigoIBGE' => 'required',
        'EstadoUF' => 'required',
        'Endereco' => 'required',
        'Brasao' => 'nullable|image',
    ]);

    // $attributes['Brasao'] = request()->file('Brasao')->store('imagens');

    Municipio::create($request->all());
    }
    return to_route('index');
    }
    public function delete($id)
    {
        if (Auth::check()) {
        $municipio = Municipio::find($id);
        $municipio->delete();
        }
        return to_route('index');
    }

    public function edit($id)
    {
        $municipio = Municipio::find($id);
        return view('edit', compact('municipio'));
    }
    public function update(Request $request, $id)
    {
        $municipio = Municipio::find($id);
        $municipio->Nome = $request->input('Nome');
        $municipio->CNPJ = $request->input('CNPJ');
        $municipio->CodigoIBGE = $request->input('CodigoIBGE');
        $municipio->EstadoUF= $request->input('EstadoUF');
        $municipio->Endereco = $request->input('Endereco');
        $municipio->update();

        return redirect('/')->with('status', 'Município atualizado com sucesso!');
    }
}
