<?php

namespace App\Http\Controllers;
use App\Models\Contato;
use App\Models\Telefone;
use App\Models\Empresa;
use Illuminate\Http\Request;

class ContatoController extends Controller
{
    public function index()
    {

        return redirect()->route('listagemC');

    }

    public function store(Request $request)
    {

        $request->validate([

            'nome'=>'required|max:255',
            'empresa'=>'required|max:255'

        ]);

        $contato = new Contato;
        $contato->nome = $request->nome;
        $contato->id_Empresa = $request->empresa;
        $contato->save();

        // salvar telefone
        foreach ($request->telefone as $telefone)
        {
            $fone = new Telefone;
            $fone->id_contato = $contato->id;
            $fone->telefone = $telefone;
            $fone->save();

        }


        return redirect()->route('home');

    }

    public function show($id)
    {
        $contato = Contato::findOrFail($id);
        $empresas = Empresa::all();
        return view('editarCliente', ['contato' => $contato, 'empresas' => $empresas]) ;
    }

    public function update(Contato $contato)
    {


        $contato->nome = input('nome');
        $contato->empresa = input('empresa');

        $contato->save();

        return redirect()->route('home');

    }

    public function destroy($id)
    {
        $contato = Contato::findOrFail($id);
        $contato->delete();

        //return redirect()->route('home');

    }

}
