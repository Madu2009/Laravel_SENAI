<!DOCTYPE html>
<html lang="{{ str_replace('_','-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro setor</title>
</head>
<body>
    <h1>Cadastro Setor</h1>

    @if(session('success'))
        <p style="color:green">{{ session('success') }}</p>
    @endif

    <form action="{{ route('setor.salvar') }}" method="POST">
        @csrf

        <label for="nome">Nome: </label>
        <input type="text" name="nome" id="nome" placeholder="Nome do setor" required value="{{ old('nome') }}">
        <br><br>

        <label for="n_corredor">Num do Corredor: </label>
        <input type="number" name="n_corredor" id="n_corredor" placeholder="Num corredor" required value="{{ old('n_corredor') }}">
        <br><br>

        <input type="submit" value="Cadastrar">
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