<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script type="text/javascript" src="/script.js"></script>
    <link rel="stylesheet" type="text/css" href="/style.css">
    <title>Editar cliente</title>
</head>

<body>
    <div class="container">
        <div class="botao">
            <a href="{{ route('home')}}"> <button id="bot1">Voltar</button></a>
        </div>
    </div>
        <div class="formulario">
        <form method="POST" action="{{route('contato.editar')}}">
            {{ csrf_field() }}
            <input name="id_contato" type="hidden" value="{{$contato->id}}">
            <div class="label">
                <label for="nome">Nome: </label><input type="text" name="nome" id="nome" required
                    value="{{$contato->nome}}">
            </div>
            <div class="label">
                <label for="empresa">Empresa: </label><select name="empresa">
                    @foreach ($empresas as $empresa)
                    @if ($empresa->id == $contato->id_Empresa)
                    <option value="{{$empresa->id}}" selected>{{$empresa->nome}}</option>
                    @else
                    <option value="{{$empresa->id}}">{{$empresa->nome}}</option>
                    @endif
                    @endforeach
                </select>
            </div>
            <div class="oldphones">
                <span class="span" newid={{$contato->id}} onclick="info2(this)">Visualizar telefones</span>

                <div class="tel" id={{$contato->id}}>
                    @foreach ($contato->telefones as $telefone)
                    <p>{{$telefone->telefone}}</p><a href="{{route('phone.delete', $telefone->id)}}">delete</a>
                    @endforeach
                </div>
                <div class="telefones">
                    <label for="telefone">Telefone</label><input type="text" name="telefone[0]" id="telefone">
                    <button id="addcampo" type="button">+</button>
                </div>
                <input type="submit" value="Cadastrar" id="botao" name="cadastrar">
        </form>
    </div>
</body>

</html>