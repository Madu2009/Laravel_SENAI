<!DOCTYPE html>
<html lang="{{ str_replace('_','-',app()->getLocale())}}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Atualizar Livro</title>
</head>
<body>
    <h1>Atualizar Livro</h1>

    @if(@session('success'))
        <p style="color:rgb(22, 215, 8)">{{ session('success')}}</p>
    @endif

    <form action="{{route('livro.update', $livro->id)}}" method="POST">
        @csrf
        @method('PUT')
        <input type="text" name="nome" value="{{ old('nome', $livro->nome)}}" required>
        <input tipe="text" name="autor" value="{{old('autor', $livro->autor)}}" required>
        <input tipe="text" name="descricao" value="{{old('descricao', $livro->descricao)}}" required>
        <input tipe="number" name="num_paginas" value="{{old('num_paginas', $livro->num_paginas)}}" required>
        <label for="editora_id">Editora: </label>
        <select name="editora_id" id="editora_id">
            @foreach ($editoras as $editora)
                <option value="{{ $editora->id }}"
                    {{ $livro->editora_id == $editora->id ? 'selected' : '' }}>
                    {{ $editora->nome }}
                </option>
            @endforeach
        </select>

        <br><br>

        <button type="submit">Atualizar</button>
    </form>

    @if($errors->any())
        <div style="color:rgb(255, 0, 0)">
            <ul>
                @foreach ($errors->all() as $erro)
                    <li>{{$erro}}</li>
                @endforeach
            </ul>
        </div>
    @endif
    
        
</body>
</html>