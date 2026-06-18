@extends('leiaute')

@section('conteudo')

<h2>Nova Postagem</h2>

<form action="{{ route('postagem.store') }}" method="POST">
    @csrf
    <div class="mb-3">
        <label>Título</label>
        <input type="text" name="titulo" class="form-control">
    </div>

    <div class="mb-3">
        <label>Autor</label>
        <input type="text" name="autor" class="form-control">
    </div>

    <div class="mb-3">
        <label>Texto</label>
        <textarea name="texto" class="form-control"></textarea>
    </div>

    <div class="mb-3">
        <label>Categoria</label>
        <select name="categoria_id" class="form-control">
            @foreach($categorias as $categoria)
                <option value="{{ $categoria->id }}">
                    {{ $categoria->nome }}
                </option>
            @endforeach
        </select>
    </div>

    <button class="btn btn-primary">Salvar</button>

</form>

@endsection