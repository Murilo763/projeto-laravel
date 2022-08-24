<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Alunos;
use App\Models\Instrutores;
use App\Models\Treinos;

class TreinosController extends Controller
{
    public function index(Request $request, Alunos $alunos, Treinos $treino)
    {
          
        $treinos = $alunos->treinos;
        $mensagemSucesso = session('mensagem.sucesso');
        
        return view('treinos.index')->with('treinos', $treinos)->with('alunos', $alunos)->with('mensagemSucesso', $mensagemSucesso)->with('treino', $treino);
    }

    public function create(Alunos $alunos)
    {
        $alunos = Alunos::all();
        return view('treinos.create', compact('alunos'));   
    }

    public function store(Request $request)
    {
        $request->validate([
            'exercicio1' => 'required',
            'exercicio2' => 'required',
            'exercicio3' => 'required',
            'exercicio4' => 'required'
        ]);

        $alunos = Alunos::findOrFail($request->aluno_id);
        $alunos->treinos()->create([
            'exercicio1' => $request->exercicio1,
            'exercicio2' => $request->exercicio2,
            'exercicio3' => $request->exercicio3,
            'exercicio4' => $request->exercicio4
        ]);

        return to_route('instrutores.index')->with('mensagem.sucesso', "Treino adicionado!");
    }

    public function edit(int $treino)
    {
        $alunos = Alunos::all();
        $treino = Treinos::findOrFail($treino);
        return view('treinos.edit', compact('alunos', 'treino'));
    }

    public function update(Treinos $treino, Request $request)
    {
        $treino->fill($request->all());
        $treino->save();

        return to_route('instrutores.index')->with('mensagem.sucesso', "Treino atualizado!");
    }

    public function destroy(Treinos $treino,  Request $request)
    {
        $treino->delete();

        return to_route('instrutores.index')->with('mensagem.sucesso', "Treino foi removido!");
    }

    public function __construct()
    {
        $this->middleware('auth');
    }
}
