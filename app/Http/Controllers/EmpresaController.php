<?php

namespace App\Http\Controllers;
use App\Models\Empresa;
use App\Models\Juridica;
use App\Models\Fisica;
use Illuminate\Http\Request;

class EmpresaController extends Controller
{
    public function index()
    {

        return redirect()->route('listagemE');
    }

    public function store(Request $request)
    {

        $request->validate([

            'nome'=>'required|max:255',
            'cpfCnpj'=>'required|max:255',
            'municipio'=>'required|max:255'

        ]);
            
        $empresa = new Empresa;
        $empresa->nome = $request->nome;
        $empresa->cpf_cnpj = $request->cpfCnpj;
        $empresa->municipio = $request->municipio;

        
            if($request->rg != "")
            {

            $empresa->tipo =0;
            $empresa->save();
            $fisica = new Fisica;
            $fisica->rg = $request->rg;
            $fisica->data_nasc = $request->dataNasc;
            $fisica->id_Empresa = $empresa->id;
            $fisica->save();

            } else {

                $empresa->tipo =1;
                $empresa->save();
                $juridica = new Juridica;
                $juridica->nome_fantasia = $request->nomeFantasia;
                $juridica->id_Empresa = $empresa->id;
                $juridica->save();

            }

        return redirect()->route('home');
    }

    public function show($id)
    {
        $empresa = Empresa::findOrFail($id);
        return view('editarEmpresa',['empresa'=>$empresa]) ;
    }

    public function update(Empresa $empresa)
    {


        $empresa->nome = input('nome');
        $empresa->cpf_cnpj = input('cpfCnpj');
        $empresa->municipio = input('municipio');

        $empresa->save();

        return redirect()->route('home');

    }

    public function destroy(Empresa $empresa)
    {

        $empresa->delete();

        return response()->json(['success'=>true]);

    }
}
