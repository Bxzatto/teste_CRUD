<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" type="text/css" href="/style.css">
    <title>Editar Empresa</title>
</head>
<body>
    <div class="container">
        <div class="botao">
            <a href="{{ route('listagemE')}}"> <button id="bot1">Voltar</button></a>
        </div>
    </div>
        <div class="formulario">
            <form method="POST" action="{{route('empresa.editar')}}">
            {{ csrf_field() }}
            <input name="id_empresa" type="hidden" value="{{$empresa->id}}">
            <div class="label">
                <label for="nome">Nome: </label><input type="text" name="nome" id="nome" required
                    value="{{$empresa->nome}}">
            </div>
            <div class="label">
                <label for="nome">CPF/CNPJ: </label><input type="text" name="cpfCnpj" id="cpfCnpj" required
                    value="{{$empresa->cpf_cnpj}}">
            </div>
            <div class="label">
                <label for="nome">Município: </label><input type="text" name="municipio" id="municipio" required
                    value="{{$empresa->municipio}}">
            </div>
            <input type="submit" value="Cadastrar" id="botao" name="cadastrar">
            </form>
        </div>
</body>
</html>