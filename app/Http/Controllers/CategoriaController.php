<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Categoria;

class CategoriaController extends Controller
{
    // Lista todas as categorias e pro index
      public function index()
    {
        $categorias = Categoria::all();// procura as categorias no banco
        return view('categoria.lista', ['categorias' => $categorias, 'filtro' => '']);// envia pra view
    }
// mostra um forlario aonde vai criar as categorias
    public function create(){
        return view('categoria.cria');
    }
// vai receber os dados do e salva no banco
    public function store(Request $request) {

// validacao ou seja que sao obrigatorio
      $request->validate([
            'nome'=> 'required|max:30'
        ]);
        try {
            $categoria = new Categoria();
            $categoria->nome = $request->input('nome');
            $categoria->save();

            session()->flash('msg', 'Armazenado com sucesso!');// mensagem de ok(peguei do git hub de Aluno)
            return redirect()->route('categoria.index');

        } catch (\Exception $e) {
            session()->flash('erro', 'Erro ao armazenar: ' . $e->getMessage());
            return redirect()->route('categoria.create');
        }
        
    }
// mostra uma categoria pelo id
    public function view($id) {
        try { // busca a categoria pelo id
            $categoria = Categoria::find($id);
            return view('categoria.visualizar', ['categoria' => $categoria]);

        } catch (\Exception $e) {
           // se der  erro salva a mensagem  e volta pra listagem
            session()->flash('erro', 'Erro ao carregar: ' . $e->getMessage());
            return redirect()->route('categoria.index');
        }
    }
 // recebe os dados  de edição e atualiza no banco
    public function update(Request $request, $id) {
// valida igual ao store
      $request->validate([
            'nome'      => 'required|max:30',     // Confere o nome
           
        ]);

        // atualiza os campos 
        try {
            $categoria = Categoria::find($id);
            $categoria->nome = $request->input('nome');
            $categoria->save();

            session()->flash('msg', 'Atualizado com sucesso!');
            return redirect()->route('categoria.index');

        } catch (\Exception $e) {
            session()->flash('erro', 'Erro ao atualizar: ' . $e->getMessage());
            return redirect()->route('categoria.edit', ['id' => $id]);
        }   
    }
// Deleta o categoria do banco
    public function destroy($id) {
         try {
        $categoria = Categoria::find($id);
        if (!$categoria) {
            session()->flash('erro', 'Categoria não encontrada!');
            return redirect()->route('categoria.index');
        }
        // remove 
        $categoria->delete();
        session()->flash('msg', 'Registro excluído com sucesso!');
        return redirect()->route('categoria.index');
    } catch (\Exception $e) {
        session()->flash('erro', 'Erro ao excluir: ' . $e->getMessage());
        return redirect()->route('categoria.index');
    }
    }
// Busca categorias
    public function search(Request $request)
    {
        $filtro = trim((string) $request->input('filtro', ''));
// busca no banco as categorias
        $categorias = Categoria::where('nome', 'like', "%{$filtro}%")->orderBy('id')->get();
 // manda as categorias encontradas e o filtro pra view
        return view('categoria.lista', ['categorias' => $categorias, 'filtro' => $filtro]);
    }
}
