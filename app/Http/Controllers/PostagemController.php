<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Postagem;
use App\Models\Categoria;
class PostagemController extends Controller
{
    
// Lista todas as categorias e pro index
public function index(Request $request)
{
    $filtro = $request->busca;
     $categorias = Categoria::all();

    $postagens = Postagem::where('titulo', 'like', "%$filtro%")->orWhere('texto', 'like', "%$filtro%")->get();

    return view('index', compact('postagens','categorias', 'filtro'));
}
    //  cadastrar a  postagem
    public function create()
    {
     $categorias = Categoria::all();

    return view('postagem.create', compact('categorias'));
    }

    // salva postagem
    public function store(Request $request)
    {
        $request->validate([
           'categoria_id' => 'required',
        'titulo' => 'required|max:60',
        'texto' => 'required'
        ]);
        try {
            $postagem = new Postagem();
        $postagem->categoria_id = $request->input('categoria_id');
        $postagem->autor = $request->input('autor');
        $postagem->titulo = $request->input('titulo');
        $postagem->texto = $request->input('texto');
        $postagem->save();

        session()->flash('msg', 'Postagem cadastrada com sucesso!');

        return redirect()->route('raiz');
        } catch (\Exception $e) {
            session()->flash('erro', 'Erro ao armazenar: ' . $e->getMessage());
            return redirect()->route('postagem.create');
        }
    }

}
