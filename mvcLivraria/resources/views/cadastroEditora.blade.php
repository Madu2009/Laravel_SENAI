<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Cadastro Editora</title>
</head>
<body>
    <h1>Cadastro Editora</h1>

    <br>
    <a href="{{route('livro.listar')}}">Listar Livro</a>
    <br>

    @if(session('sucess'))
        <p style="color:green">{{session('sucess')}}</p>
    @endif

    <form action="{{route('editora.salvar')}}" method="POST">
         @csrf
        <label for="nome">Nome: </label>
        <input type="text" name="nome" id="nome" placeholder="Nome..." require value="{{ old('nome')}}">
        <br><br>
        <label for="cnpj">CNPJ: </label>
        <input type="number" name="cnpj" id="cnpj" placeholder="CNPJ..." require value="{{ old('cnpj')}}">
        <br><br>
        <label for="pais">País: </label>
        <input type="text" name="pais" id="pais" placeholder="País..." require value="{{ old('pais')}}">
        <br><br>
        <label for="cidade">Cidade: </label>
        <input type="text" name="cidade" id="cidade" placeholder="Cidade..." require value="{{ old('cidade')}}">
        <br><br>
        

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