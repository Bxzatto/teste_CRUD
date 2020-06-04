<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script type="text/javascript" src="/script.js"></script>
    <link rel="stylesheet" type="text/css" href="/style.css">
    <title>Clientes</title>
</head>

<body>
    <div class="botao" id="volt">
        <a href="{{ route('home')}}"> <button id="bot1">Voltar</button></a>
        
    </div>
    <form method="GET" action="{{route('filtroC')}}">
            {{ csrf_field() }}

                <div class="label">
                    <label for="nome">Nome</label><input type="text" name="nome" id="nome">
                </div>

            <input type="submit" value="buscar" id="botao" name="buscar">

    </form>
    <div class="botao">
    <a href="{{ route('listagemC')}}"> <button id="botB">limpar busca</button></a>
    </div>
    <div class="tabela" id="tabela">
        <table>
            <thead>
                <tr>
                    <th>Nome</th>
                    <th>Empresa</th>
                    <th> </th>
                    <th> Ações </th>

                </tr>
            </thead>
            <tbody>
                
                @foreach ($contatos as $contato)
                <tr>
                    <td>{{ $contato->nome }}</td>
                    <td>{{ $contato->empresa->nome }}</td>
                    <td>
                        <span class="span" newid={{$contato->id}} onclick="info2(this)">Telefones</span>
                        <div class="tel" id={{$contato->id}}>
                            @foreach ($contato->telefones as $telefone)
                            <p>{{$telefone->telefone}}</p>
                            @endforeach
                        </div>
                    </td>
                    <td>
                        <a href="{{route('contato.showOne', $contato->id)}}">edit</a>
                        <a href="{{route('contato.delete', $contato->id)}}">delete</a>
                    </td>
                </tr>
                        @endforeach
                
            </tbody>
        </table>
    </div>
</body>

</html>