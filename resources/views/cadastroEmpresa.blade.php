<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script type="text/javascript" src="script.js"></script>
    <link rel="stylesheet" type="text/css" href="style.css">
    <title>Cadastro empresa</title>
</head>

<body>
    <div class="container">

        <div class="pagina" id="pag3">
            <div class="botao">
            <a href="{{ route('home')}}"> <button id="bot1">Voltar</button></a>
            </div>
            <h1>Cadastro de empresa</h1>
            <form id="formulario" method="POST" action="{{ route('empresa.add') }}">
                {{ csrf_field() }}
                <div class="label">
                    <label for="nome">Nome</label><input type="text" name="nome" id="nome">
                </div>
                <div class="label">
                    <label for="cpfCnpj">CPF/CNPJ</label><input type="text" name="cpfCnpj" id="cpfCnpj">
                </div>
                <div class="label">
                    <label for="municipio">Município</label><input type="text" name="municipio" id="municipio">
                </div>
                <div class="wrap-span">
                    <span class="span" onclick="info('pag4')">Pessoa física</span>
                    <span class="span" onclick="info('pag5')">Pessoa jurídica</span>
                </div>

                <div class="pagina" id="pag4">
                    <div class="label">
                        <label for="rg">RG</label><input type="text" name="rg" id="rg" value="">
                    </div>
                    <div class="label">
                        <label for="dataNasc">Data de nascimento</label><input type="date" name="dataNasc"
                            id="dataNasc">
                    </div>
                </div>

                <div class="pagina" id="pag5">
                    <div class="label">
                        <label for="nomeFantasia">Nome fantasia</label><input type="text" name="nomeFantasia"
                            id="nomeFantasia">
                    </div>
                </div>
                <input type="submit" value="Cadastrar" id="botao" name="cadastrar">
            </form>
        </div>

    </div>
</body>

</html>