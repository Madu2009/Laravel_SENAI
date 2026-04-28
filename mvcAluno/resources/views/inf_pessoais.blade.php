<!DOCTYPE html>
<html lang="{{ str_replace('_','-',app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Informações Pessoais</title>
</head>
<body>
    <h1>Informações Pessoais</h1>

    @if(session('success'))
        <p style="color:green">{{ session('success')}}</p>
    @endif

    <form action="{{route('pessoais.salvar') }}" method="POST">
        @csrf
        <label for="telefone">Telefone: </label>
        <input type="number" name="telefone" id="telefone" placeholder="Telefone..."
            require value="{{ old('telefone') }}"
        >
        <br><br>
        <label for="data_nascimento">Data Nascimento: </label>
        <input type="date" name="data_nascimento" id="data_nascimento" placeholder="Data Nascimento..."
            required value="{{ old('data_nascimento')}}"
        >

        <br><br>
        <label for="endereco">Endereço: </label>
        <input type="text" name="endereco" id="endereco" placeholder="Endereço..."
            required value="{{ old('endereco')}}"
        >

        <br><br>
        <label for="idade">Idade: </label>
        <input type="number" name="idade" id="idade" placeholder="Idade..."
            required value="{{ old('idade')}}"
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