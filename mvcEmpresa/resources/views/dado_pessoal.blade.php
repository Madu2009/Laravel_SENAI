<!DOCTYPE html>
<html lang="{{ str_replace('_','-',app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dados Pessoais</title>
</head>
<body>
    <h1>Dados Pessoais</h1>

    @if(session('success'))
        <p style="color:green">{{ session('success')}}</p>
    @endif

    <form action="{{route('pessoais.salvar') }}" method="POST">
        @csrf
        <label for="'cpf">CPF: </label>
        <input type="text" name="cpf" id="cpf" placeholder="CPF..."
            require value="{{ old('cpf') }}"
        >
        <br><br>
        <label for="rg">RG: </label>
        <input type="text" name="rg" id="rg" placeholder="RG..."
            required value="{{ old('rg')}}"
        >

        <br><br>
        <label for="data_nascimento">Data Nascimento: </label>
        <input type="date" name="data_nascimento" id="data_nascimento" placeholder="Data Nascimento..."
            required value="{{ old('data_nascimento')}}"
        >

        <br><br>
        <label for="cep">CEP: </label>
        <input type="text" name="cep" id="cep" placeholder="CEP..."
            required value="{{ old('cep')}}"
        >
        
        <br><br>
        <label for="funcionario_id">Funcionario ID: </label>
        <input type="text" name="funcionario_id" id="funcionario_id" placeholder="Funcionario ID..."
            required value="{{ old('funcionario_id')}}"
        >

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