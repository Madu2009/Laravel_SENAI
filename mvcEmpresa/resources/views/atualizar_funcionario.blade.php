<!DOCTYPE html>
<html lang="{{ str_replace('_','-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Atualizar Funcionário</title>
</head>
<body>
    <h1>Atualizar Funcionário</h1>

    @if(session('success'))
        <p style="color: green">{{ session('success') }}</p>
    @endif

    <form action="{{ route('funcionario.update', $funcionario->id) }}" method="POST">
        @csrf
        @method('PUT')

        <input type="text" name="nome" 
            value="{{ old('nome', $funcionario->nome)}}" required>

        <input type="text" name="sobrenome" 
            value="{{ old('sobrenome', $funcionario->sobrenome)}}" required>

        <input type="text" name="cargo" 
            value="{{ old('cargo', $funcionario->cargo)}}" required>
        
        <input type="text" name="email" 
            value="{{ old('email', $funcionario->email)}}" required>

        <input type="date" name="data_admissao" 
            value="{{ old('data_admissao', $funcionario->data_admissao)}}" required>
        
        <input type="text" name="salario" 
            value="{{ old('salario', $funcionario->salario)}}" required>

        
        <button type="submit">Atualizar</button>
    </form>

    @if($errors->any())
        <div style="color: red">
            <ul>
                @foreach ($errors->all() as $erro)
                    <li>{{ $erro }}</li>
                @endforeach
            </ul>
        </div>
    @endif
</body>
</html>