@extends('leiaute')

@section('conteudo')

@foreach($postagens as $postagem)

<article>
    <header class="mb-4">
        <h1 class="fw-bolder mb-1">
            {{ $postagem->titulo }}
        </h1>

        <div class="text-muted fst-italic mb-2">
            Postado por {{ $postagem->autor ?? 'Anônimo' }}
        </div>

        <a class="badge bg-secondary text-decoration-none link-light">
          {{ $postagem->categoria->nome ?? 'Sem categoria' }}
        </a>
    </header>

    <section class="mb-3">
        <p class="fs-5 mb-4">
            {{ $postagem->texto }}
        </p>
    </section>
</article>

<button class="btn btn-sm btn-link mb-3">
    Comentários
</button>

<section class="mb-5">
    <div class="card bg-light">
        <div class="card-body">
    <form action="{{ route('comentario.store') }}" method="POST">
    @csrf
 <input type="hidden"name="postagem_id"value="{{ $postagem->id }}">

 <div class="mb-2">
 <input type="text"name="autor"class="form-control"placeholder="Seu nome (opcional)"></div>
<div class="mb-2">
         <textarea name="texto" class="form-control"rows="3" placeholder="Digite seu comentário"></textarea></div>
                <button class="btn btn-primary">
                    Enviar
                </button>
            </form>
            <hr>
            @foreach($postagem->comentarios as $comentario)
            <div class="d-flex mb-3">
                <div class="ms-3">
                    <div class="fw-bold">
                        {{ $comentario->autor ?? 'Anônimo' }}
                    </div>
                    {{ $comentario->texto }}
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>
@section('sidebar')
<div class="col-lg-4">

    <div class="card mb-4">
        <div class="card-header">Search</div>
        <div class="card-body">

            <form method="GET" action="/">
                <div class="input-group">
                    <input class="form-control"
                           type="text"
                           name="busca"
                           placeholder="Buscar postagem..."
                           value="{{ $filtro ?? '' }}">
                    <button class="btn btn-primary">
                        Buscar
                    </button>
                </div>
            </form>

        </div>
    </div>
            <div class="card mb-4">
                <div class="card-header">Categories</div>
                <div class="card-body">
                    <ul class="list-unstyled mb-0">
                        @foreach($categorias as $categoria)
                            <li><a href="#!">{{ $categoria->nome }}</a></li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
</div>
@endsection
<hr>

@endforeach

@endsection