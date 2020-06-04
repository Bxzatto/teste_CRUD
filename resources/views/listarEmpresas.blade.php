<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script type="text/javascript" src="/script.js"></script>
    <link rel="stylesheet" type="text/css" href="/style.css">
    <title>Empresas</title>
</head>

<body>
    <div class="botao" id="volt">
        <a href="{{ route('home')}}"> <button id="bot1">Voltar</button></a>
    </div>
        <form method="GET" action="{{route('filtroE')}}">
            {{ csrf_field() }}

                <div class="label">
                    <label for="nome">CPF/CNPJ</label><input type="text" name="cpf_cnpj" id="cpf_cnpj">
                </div>

            <input type="submit" value="buscar" id="botao" name="buscar">

    </form>
    <div class="botao">
    <a href="{{ route('listagemE')}}"> <button id="botB">limpar busca</button></a>
    </div>
    <div class="tabela" id="tabela">
        <table>
            <thead>
                <tr>
                    <th>Nome</th>
                    <th>CPF/CNPJ</th>
                    <th>Município</th>
                    <th>
                    <th>Ações</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($empresas as $empresa)
                <tr>
                    <td>{{ $empresa->nome }}</td>
                    <td>{{ $empresa->cpf_cnpj }}</td>
                    <td>{{ $empresa->municipio }}</td>
                    <td>
                        <span class="span" newid={{$empresa->id}} onclick="info2(this)">Detalhes</span>
                        <div class="det" id={{$empresa->id}}>
                            @if ($empresa->tipo == 0)
                            <p id="title">RG: </p>
                            <p>{{$empresa->empresaF->rg}}</p>
                            <p id="title">Data de nascimento: </p>
                            <p>{{$empresa->empresaF->data_nasc}}</p>
                            @else
                            <p id="title">Nome fantasia: </p>
                            <p>{{$empresa->empresaJ->nome_fantasia}}</p>
                            @endif
                        </div>
                    </td>
                    <td>
                        <a href="{{route('empresa.showOne', $empresa->id)}}">edit</a>
                        <a href="{{route('empresa.delete', $empresa->id)}}">delete</a>
                    </td>
                    @endforeach

            </tbody>
        </table>
    </div>
</body>

</html>