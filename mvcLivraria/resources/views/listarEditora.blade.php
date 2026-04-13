<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Listar Editora</title>
</head>
<body>
    <h1>Relátorio de Editoras</h1>

    <a href="{{route('livro.cadastro')}}">Cadastrar Livro</a>
    <br>
    <a href="{{route('editora.cadastro')}}">Cadastrar Editora</a>
    <br>

    <table border="1">
        <thead>
            <tr>
                <th>ID</th>
                <th>NOME</th>
                <th>CNPJ</th>
                <th>PAÍS</th>
                <th>CIDADE</th>
            <tr>
        </thead>
        <tbody>
            @forelse($editoras as $editora)
                <tr>
                    <td>{{$editora->id}}</td>
                    <td>{{$editora->nome}}</td>
                    <td>{{$editora->cnpj}}</td>
                    <td>{{$editora->pais}}</td>
                    <td>{{$editora->cidade}}</td>
                </tr>
            @empty
                <tr>
                    <td colspan="3">Nenhuma editora encontrada</td>
                </tr>
            @endforelse
        </tbody>
</body>
</html>