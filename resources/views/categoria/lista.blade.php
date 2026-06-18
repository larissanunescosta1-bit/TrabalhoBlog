@extends('leiaute')

@section('conteudo')

<h2>Categorias</h2>
<a class="btn btn-primary mb-3"
   href="{{ route('categoria.create') }}">
   Nova Categoria
</a>
<table class="table">
    <thead>
        <tr>
            <th>Nome</th>
            <th>Ações</th>
        </tr>
    </thead>
    <tbody>
    @foreach($categorias as $categoria)
        <tr>
        <td>{{ $categoria->nome }}</td>
            <td>
                <a class="btn btn-secondary btn-sm"href="{{ route('categoria.view',$categoria->id) }}">Editar</a>
                <a class="btn btn-danger btn-sm  btn-excluir"href="{{ route('categoria.destroy', encrypt($categoria->id)) }}">Excluir</a>
 </td>
 </tr>

    @endforeach

    </tbody>

</table>

@endsection

@section('script')
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            var botoesExcluir = document.querySelectorAll('.btn-excluir');

            botoesExcluir.forEach(function (botao) {
                botao.addEventListener('click', function (event) {
                    if (!confirm('Tem certeza que deseja excluir este aluno?')) {
                        event.preventDefault();
                    }
                });
            });
        });
    </script>
@endsection