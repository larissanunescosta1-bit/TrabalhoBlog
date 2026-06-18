@extends('leiaute')

@section('conteudo')

<h2>Editar Categoria</h2>
<form action="{{ route('categoria.update',['id' => $categoria->id]) }}"
      method="POST">
    @csrf
    <div class="mb-3">
        <label class="form-label"> Nome </label>

        <input type="text"name="nome"value="{{ $categoria->nome }}"class="form-control @error('nome') is-invalid @enderror" id="nome" name="nome" value="{{ old('nome', $categoria->nome) }}"required>
 <div class="invalid-feedback"> @error('nome') {{ $message }} @enderror </div>
    </div>
    <button class="btn btn-primary">
        Atualizar
    </button>

</form>

@endsection