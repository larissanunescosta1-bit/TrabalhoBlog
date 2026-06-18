@extends('leiaute')

@section('conteudo')
<h2>Nova Categoria</h2>
<form action="{{ route('categoria.store') }}"
      method="POST">
    @csrf
    <div class="mb-3">
        <label class="form-label"> Nome</label>

        <input type="text"name="nome" class="form-control @error('nome') is-invalid @enderror" id="nome" value="{{ old('nome') }}" name="nome" required >
     <div class="invalid-feedback">
                @error('nome') {{ $message }} @enderror
            </div>
    </div>

    <button class="btn btn-primary">
        Salvar
    </button>

</form>

@endsection