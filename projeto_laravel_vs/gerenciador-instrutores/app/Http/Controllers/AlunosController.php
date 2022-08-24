<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Alunos;
use App\Models\Instrutores;
use App\Models\Treinos;
use DB;

class AlunosController extends Controller
{
    public function index( Instrutores $instrutores, Treinos $treinos)
    {
        
        $alunos = $instrutores->alunos;
        $mensagemSucesso = session('mensagem.sucesso');
        
        return view('alunos.index')->with('treino', $treinos)->with('alunos', $alunos)->with('instrutores', $instrutores)->with('mensagemSucesso', $mensagemSucesso);
    }

    public function create()
    {
        $instrutores = Instrutores::all();
        return view('alunos.create', compact('instrutores'));   
    }

    public function store(Request $request)
    {
        $request->validate([
            'nome' => 'required'
        ]);

        $instrutores = Instrutores::findOrFail($request->instrutor_id);
        $instrutores->alunos()->create([
            'nome' => $request->nome
        ]);

        return to_route('instrutores.index')->with('mensagem.sucesso', "Aluno adicionado!");
    }

    public function destroy(Alunos $aluno,  Request $request)
    {
        $aluno->delete();

        return to_route('alunos.index.2')->with('mensagem.sucesso', "Aluno foi removido!");
    }
}
