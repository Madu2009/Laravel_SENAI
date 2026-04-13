<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Listar Livro</title>
</head>
<body>
    <h1>Relátorio de Livros</h1>

    <a href="{{route('livro.cadastro')}}">Cadastrar Livro</a>
    <br>
    <a href="{{route('editora.cadastro')}}">Cadastrar Editora</a>
    <br>  

    <table border="1">
        <thead>
            <tr>
                <th>ID</th>
                <th>NOME</th>
                <th>AUTOR</th>
                <th>DESCRIÇÃO</th>
                <th>NUM PAGINAS</th>
                <th>DATA PUBLICAÇÃO</th>
                <th>ID EDITORA</th>
                <th>Atualizar</th>
            <tr>
        </thead>
        <tbody>
            @forelse($livros as $livro)
                <tr>
                    <td>{{$livro->id}}</td>
                    <td>{{$livro->nome}}</td>
                    <td>{{$livro->autor}}</td>
                    <td>{{$livro->descricao}}</td>
                    <td>{{$livro->num_paginas}}</td>
                    <td>{{$livro->data_publicacao}}</td>
                    <td>{{$livro->editora?->id}}</td>
                    <td>{{$livro->editora?->nome}}</td>
                    <td>{{$livro->detalhes?->custo}}</td>
                    <td>{{$livro->detalhes?->preco_venda}}</td>
                    <td>{{$livro->detalhes?->imposto}}</td>
                    
                    <td>
                        <a href="{{route('livro.atualizar', $livro->id)}}">Atualizar</a>
                    </td>
                    
                </tr>
            @empty
                <tr>
                    <td colspan="3">Nenhum livro encontrado</td>
                </tr>
            @endforelse
        </tbody>
</body>
</html>