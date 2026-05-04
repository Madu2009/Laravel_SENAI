<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Funcionário</title>
    <style>
    .container-cards {
        display: flex;
        flex-wrap: wrap;
        gap: 20px;
    }

    .card-aluno {
        border: 1px solid #ccc;
        border-radius: 10px;
        padding: 15px;
        width: 250px;
        box-shadow: 2px 2px 8px rgba(0,0,0,0.1);
        background-color: #fff;
    }

    .card-aluno h3 {
        margin: 0 0 10px 0;
    }

    .card-aluno p {
        margin: 5px 0;
    }

    .acoes {
        margin-top: 10px;
        display: flex;
        justify-content: space-between;
    }
</style>
</head>
<body>
    <h1>Relatório de Funcionários</h1>
    <table border="1">
        <thead>
            <tr>
                <th>ID</th>
                <th>NOME</th>
                <th>SOBRENOME</th>
                <th>CARGO</th>
                <th>EMAIL</th>
                <th>DATA ADMISSÃO</th>
                <th>SALÁRIO</th>
                <th>Atualizar</th>
                <th>Deletar</th>
            </tr>
        </thead>
        <tbody>
            @forelse($funcionarios as $funcionario)
                <tr>
                    <td>{{ $funcionario->id }}</td>
                    <td>{{ $funcionario->nome }}</td>
                    <td>{{ $funcionario->sobrenome }}</td>
                    <td>{{ $funcionario->cargo }}</td>
                    <td>{{ $funcionario->email }}</td>
                    <td>{{ $funcionario->data_admissao }}</td>
                    <td>{{ $funcionario->salario }}</td>

                    
                    <td>
                        <a href="{{route('funcionario.atualizar', $funcionario->id)}}">Atualizar</a>
                    </td>
                    <td>
                        <form action="{{ route('funcionario.deletar', $funcionario->id)}}" method="POST"
                            onsubmit="return confirm('Deseja realmente excluir');">
                            @csrf
                            @method('DELETE')
                            <button type="submit">Excluir</button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="3"> Nenhum funcionário encontrado</td>
                </tr>
            @endforelse
        </tbody>
    </table>

    <div class="container-cards">
        @forelse($funcionarios as $funcionario)
            <div class="card-funcionario">
                <h3>{{ $funcionario->nome }}</h3>

                <p><strong>ID:</strong> {{ $funcionario->id }}</p>
                <p><strong>NOME:</strong> {{ $funcionario->nome }}</p>
                <p><strong>SOBRENOME:</strong> {{ $funcionario->sobrenome }}</p>
                <p><strong>CARGO:</strong> {{ $funcionario->cargo }}</p>
                <p><strong>EMAIL:</strong> {{ $funcionario->email }}</p>
                <p><strong>DATA ADMISSÃO:</strong> {{ $funcionario->data_admissao }}</p>
                <p><strong>SALÁRIO:</strong> {{ $funcionario->salario }}</p>

                <p><strong>NOME:</strong> {{ $funcionario->departamento?->nome }}</p>
                <p><strong>SIGLA:</strong> {{ $funcionario->departamento?->sigla }}</p>
                <p><strong>ORÇAMENTO:</strong> {{ $funcionario->departamento?->orcamento }}</p>
                <p><strong>DATA CRIAÇÃO:</strong> {{ $funcionario->departamento?->data_criacao }}</p>

                <div class="acoes">
                    <a href="{{ route('funcionario.atualizar', $funcionario->id) }}">Editar</a>

                    <form action="{{ route('funcionario.deletar', $funcionario->id) }}" method="POST"
                        onsubmit="return confirm('Deseja realmente excluir');">
                        @csrf
                        @method('DELETE')
                        <button type="submit">Excluir</button>
                    </form>
                </div>
            </div>
        @empty
            <p>Nenhum aluno encontrado</p>
        @endforelse
        <div class="card-aluno">
            <h3>Nome do Aluno</h3>

            <p><strong>ID:</strong> 300</p>
            <p><strong>Email:</strong> email@exemplo.com</p>
            <p><strong>Turma ID:</strong> 20</p>
            <p><strong>Série:</strong> 1EF</p>
            <p><strong>Sala:</strong> 200</p>
        </div>
    </div>

</body>
</html>