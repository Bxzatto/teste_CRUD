<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\DB;
use App\Models\Empresa;
use App\Models\Contato;
use App\Models\Telefone;
use App\Models\Fisica;
use App\Models\Juridica;
use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('index');
})->name('home');

//CADASTRO 
Route::get('/clienteCadastro', function () {
    $empresas = Empresa::all();
    return view('cadastroCliente',['empresas' => $empresas]) ;
})->name('contatoCadastro');

Route::get('/empresaCadastro', function () {
    return view('cadastroEmpresa') ;
})->name('empresaCadastro');

//LISTAGEM

Route::get('/listaContatos', function () {
    $contatos = Contato::all();
    return view('listarClientes', ['contatos'=>$contatos]) ;
})->name('listagemC');

Route::get('/listaEmpresa', function () {
    $empresas = Empresa::all();
    return view('listarEmpresas', ['empresas' => $empresas]) ;
})->name('listagemE');

Route::get('/contato/busca', function(){

    $nome = $_GET['nome'];
    $contato = DB::table('contato')->where('nome', $nome)->get();
    $contatos = [];
    foreach($contato as $unit)
    {
        $contatos[] = Contato::find($unit->id);
    }
       return view('listarClientes',['contatos'=>$contatos]); 
    
    

})->name('filtroC');

Route::get('/empresa/busca', function(){

    $cpfCnpj = $_GET['cpf_cnpj'];
    $empresa = DB::table('empresa')->where('cpf_cnpj', $cpfCnpj)->get();
    $empresas = [];
    foreach($empresa as $unit)
    {
        $empresas[] = Empresa::find($unit->id);
    }
       return view('listarEmpresas',['empresas'=>$empresas]);

})->name('filtroE');


//UPDATE

Route::post('/editarCliente', function (Request $request) {

        $contato = Contato::find($request->id_contato);
        $contato->nome = $request->nome;
        $contato->id_Empresa = $request->empresa;
        $contato->save();
        if($request->telefone[0] != "")
        {
        foreach ($request->telefone as $telefone)
        {
            $fone = new Telefone;
            $fone->id_contato = $contato->id;
            $fone->telefone = $telefone;
            $fone->save();

        }
    }
      return redirect()->route('listagemC');
})->name('contato.editar');

Route::post('/editarEmpresa', function (Request $request){

        $empresa = Empresa::find($request->id_empresa);
        $empresa->nome = $request->nome;
        $empresa->cpf_cnpj = $request->cpfCnpj;
        $empresa->municipio = $request->municipio;
        $empresa->save();

        return redirect()->route('listagemE');

})->name('empresa.editar');

//DELETE

Route::get('/delete_contato/{id}', function ($id) {
    $telefones = Telefone::all();
    $contato = Contato::findOrFail($id);
    foreach($telefones as $telefone)
    {
        if($telefone->id_contato == $contato->id)
        {
            $telefone->delete();
        }
    }
    
    $contato->delete();

    return redirect()->route('listagemC');
})->name('contato.delete');

Route::get('/delete_phone/{id}', function ($id) {
    $telefone = Telefone::findOrFail($id);
    $telefone->delete();

    return back();

})->name('phone.delete');

Route::get('/delete_empresa/{id}', function ($id) {
    $empresa = Empresa::findOrFail($id);
    $telefones = Telefone::all();
    if($empresa->tipo == 0){
        $fisica = Fisica::findOrFail($empresa->empresaF->id);
        $fisica->delete();
    }else{
    $juridica = Juridica::findOrFail($empresa->empresaJ->id);
    $juridica->delete();
    }
    $contatos = Contato::all();
    foreach($contatos as $contato){
        if($contato->id_Empresa == $empresa->id){
            foreach($telefones as $telefone)
        {
        if($telefone->id_contato == $contato->id)
        {
            $telefone->delete();
        }
        }
            $contato->delete();
        }
    }
    $empresa->delete();

    return back();
})->name('empresa.delete');

Route::get("contato", "ContatoController@index")->name('contato.show');
Route::get("contato/{contato}", "ContatoController@show")->name('contato.showOne');
Route::post("contato", "ContatoController@store")->name('contato.add');

Route::get("empresa", "EmpresaController@index")->name('empresa.show');
Route::get("empresa/{empresa}", "EmpresaController@show")->name('empresa.showOne');
Route::post("empresa", "EmpresaController@store")->name('empresa.add');