<!DOCTYPE html>
<html lang="{{ str_replace('_','-',app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro Funcionários</title>
</head>
<body>
    <h1>Cadastro Funcionários</h1>

    @if(session('success'))
        <p style="color:green">{{ session('success')}}</p>
    @endif

    <form action="{{route('funcionario.salvar') }}" method="POST">
        @csrf
        <label for="nome">Nome: </label>
        <input type="text" name="nome" id="nome" placeholder="Nome..."
            require value="{{ old('nome') }}"
        >
        <br><br>
        <label for="email">Email: </label>
        <input type="email" name="email" id="email" placeholder="Email..."
            required value="{{ old('email')}}"
        >
        <br><br>
        <label for="sobrenome">Sobrenome: </label>
        <input type="sobrenome" name="sobrenome" id="sobrenome" placeholder="Sobrenome..."
            required value="{{ old('sobrenome')}}"
        >
        <br><br>
        <label for="cargo">Cargo: </label>
        <input type="cargo" name="cargo" id="cargo" placeholder="Cargo..."
            required value="{{ old('cargo')}}"
        >
        <br><br>
        <label for="data_admissao">Data Admissao: </label>
        <input type="data_admissao" name="data_admissao" id="data_admissao" placeholder="Data Admissao..."
            required value="{{ old('data_admissao')}}"
        >
        <br><br>
        <label for="salario">Salário: </label>
        <input type="salario" name="salario" id="salario" placeholder="Salário..."
            required value="{{ old('salario')}}"

        >
        <br><br>
        <label for="departamento_id">ID do Departamento: </label>
       
        <select name="departamentos_id" id="departamentos_id">
            @foreach ($departamentos as $departamento)
                <option value="{{$departamento->id}}">{{$departamento->serie}}</option>
            @endforeach
        </select>

        <input type="submit" value="Cadastrar">
    </form>

    @if($errors->any())
        <div style="color:red">
            <ul>
                @foreach ($errors->all() as $erro)
                    <li>{{ $erro }}</li>
                @endforeach
            </ul>
        </div>
    @endif
</body>
</html>