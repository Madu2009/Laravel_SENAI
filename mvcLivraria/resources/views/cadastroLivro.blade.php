<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Cadastro Livros</title>
</head>
<body>
    <h1>Cadastro Livros</h1>

     <br>
    <a href="{{route('livro.listar')}}">Listar Livro</a>
    <br>

    @if(session('sucess'))
        <p style="color:green">{{session('sucess')}}</p>
    @endif

    <form action="{{route('livro.salvar')}}" method="POST">
        @csrf
        <label for="nome">Nome: </label>
        <input type="text" name="nome" id="nome" placeholder="Nome..." require value="{{ old('nome')}}">
        <br><br>
        <label for="autor">Autor: </label>
        <input type="text" name="autor" id="autor" placeholder="Autor..." require value="{{ old('autor')}}">
        <br><br>
        <label for="descricao">Descrição: </label>
        <input type="text" name="descricao" id="descricao" placeholder="Descrição..." require value="{{ old('descricao')}}">
        <br><br>
        <label for="num_paginas">Número de Páginas: </label>
        <input type="number" name="num_paginas" id="num_paginas" placeholder="Número de Páginas" require value="{{ old('num_paginas')}}">

        <input type="submit" value="Cadastrar">
    </form>

    @if($errors->any())
       <div style="color: red">
           <ul>
            @foreach ($errors->all() as $erro)
                   <li>{{$erro}}</li>
            @endforeach
           </ul>
       </div>
    @endif
</body>
</html>