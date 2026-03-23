<!DOCTYPE html>
<html lang="{{str_replace('_','_', app()->getLocale())}}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadrasto Produtos</title>
</head>
<body>
    <h1>Cadastro Produtos</h1>

    @if(session('sucess'))
        <p style="color:rgb(18, 178, 210)">{{session('sucess')}}</p>
    @endif

    <form action="{{route('produto.salvar')}}" method="POST">
        @csrf
        <label for="nome">Nome: </label>
        <input type="text" name="nome" id="nome" placeholder="Nome do Produto" require value="{{ old('nome')}}">
        <br><br>
         <label for="quantidade">Quantidade: </label>
        <input type="int" name="quantidade" id="quantidade" placeholder="Quantidade" require value="{{ old('quantidade')}}">
        <br><br>
        <label for="Preco">Preço: </label>
        <input type="int" name="preco" id="preco" placeholder="Preço" require value="{{ old('preco')}}">
        <br><br>
        
        <input type="submit" value="Cadastrar">
    </form>

    @if($errors->any())
       <div style="color: rgb(246, 255, 0)">
           <ul>
            @foreach ($errors->all() as $erro)
                   <li>{{$erro}}</li>
            @endforeach
           </ul>
       </div>
    @endif
</body>
</html>