<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Relatório de Produtos</title>
</head>
<body>
    <h1>Relátorio deProdutos</h1>
    <table border="1">
        <thead>
            <tr>
                <th>ID</th>
                <th>NOME</th>
                <th>QUANTIDADE</th>
                <th>PRECO</th>
                <th>Deletar</th>
                <th>Atualizar</th>
            <tr>
        </thead>
        <tbody>
            @forelse($produtos as $produto)
                <tr>
                    <td>{{$produto->id}}</td>
                    <td>{{$produto->nome}}</td>
                    <td>Faremos a encomenda</td>
                    <td>Faremos a encomenda</td>
                </tr>

            @empty
                <tr>
                    <td colspan="3">Nenhum produto encontrado</td>
                </tr>

            @endforelse

        </tbody>


</body>
</html>