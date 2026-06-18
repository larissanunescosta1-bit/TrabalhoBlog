<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Comentario;
class ComentarioController extends Controller
{
     // cria  comentario
    public function create()
    {
        $postagens = Postagem::all();

        return view('comentario.create', compact('postagens'));
    }

    // salva comentario
    public function store(Request $request)
    {
        Comentario::create([
            'postagem_id' => $request->postagem_id,
            'autor' => $request->autor,
            'texto' => $request->texto
        ]);
        return redirect()->route('raiz');
    }
}
