<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script type="text/javascript" src="script.js"></script>
    <link rel="stylesheet" type="text/css" href="style.css">
    <title>CRUD</title>
</head>

<body>
    <div class="container">
        <div class="pagina" id="list">
            <div class="botao">
                <a href="{{ route('contatoCadastro')}}"><button id="botao1">Cadastrar cliente</button></a>
                <a href="{{ route('empresaCadastro')}}"><button id="botao2">Cadastrar empresa</button></a>
            </div>
            <div class="botao" id="list">

                <a href="{{ route('contato.show')}}"><button id="botao1">Listar clientes</button></a>
                <a href="{{ route('empresa.show')}}"><button id="botao2">Listar empresas</button></a>

            </div>
        </div>
    </div>
</body>

</html>