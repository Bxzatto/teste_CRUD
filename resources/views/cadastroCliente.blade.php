<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script type="text/javascript" src="script.js"></script>
    <link rel="stylesheet" type="text/css" href="style.css">
    <title>Document</title>
</head>

<body>
    <div class="container">
        <div class="pagina">
            <div class="botao">
            <a href="{{ route('home')}}"> <button id="bot1">Voltar</button></a>
            </div>
            <h1>Cadastro de cliente</h1>
            <form id="formulario" method="POST" action="{{ route('contato.add') }}">
                {{ csrf_field() }}
                <div class="label">
                    <label for="nome">Nome</label><input type="text" name="nome" id="nome">
                </div>
                <div class="label">
                    <label for="empresa">Empresa</label><select name="empresa">
                        @foreach ($empresas as $empresa)
                        <option value="{{$empresa->id}}">{{$empresa->nome}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="telefones">
                    <label for="telefone">Telefone</label><input type="text" name="telefone[0]" id="telefone">
                    <button id="addcampo" type="button">+</button>
                </div>
                <input type="submit" value="Cadastrar" id="botao" name="cadastrar">
            </form>
        </div>
    </div>
</body>

</html>