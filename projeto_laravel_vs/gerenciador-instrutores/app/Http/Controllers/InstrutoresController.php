<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Instrutores;
use App\Models\User;
use App\Models\Alunos;
use App\Models\Treinos;


class InstrutoresController extends Controller
{
    public function index(Request $request)
    {
        $instrutores = Instrutores::all();
        $mensagemSucesso = session('mensagem.sucesso');
        
        return view('instrutores.index')->with('instrutores', $instrutores)->with('mensagemSucesso', $mensagemSucesso);
    }

    public function return_json(Request $request)
    {
        $instrutores = Instrutores::all();
 
        
        return response()->json($instrutores, 200);
    }

    public function return_json2(Instrutores $instrutores, Request $request)
    {
        //$alunos = $instrutores->alunos;
        $alunos = Alunos::all();

        
        return response()->json($alunos, 200);
    }

    public function return_json3(Instrutores $instrutores, Request $request)
    {
        //$alunos = $instrutores->alunos;
        $treinos = Treinos::all();
        
        return response()->json($treinos, 200);
    }

    public function create()
    {
        return view('instrutores.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nome' => 'required',
            'idade' => 'required',
            'turno' => 'required'
        ]);
        $instrutor = Instrutores::create($request->all());


        $users = User::all(); 
        
        foreach($users as $user)
        {
            $email = new \App\Mail\NovoInstrutor(
                $request->nome,
                $request->idade,
                $request->turno
            );
    
            $email->subject = 'Um novo instrutor foi adicionado.';

            \Illuminate\Support\Facades\Mail::to($user)->send($email);
            sleep(5);
        }


        return to_route('instrutores.index')->with('mensagem.sucesso', "Instrutor '{$instrutor->nome}' adicionado!");
    }

    public function destroy(Instrutores $instrutore,  Request $request)
    {
        $instrutore->delete();

        return to_route('instrutores.index')->with('mensagem.sucesso', "Instrutor '{$instrutore->nome}' foi removido!");
    }

    public function edit(Instrutores $instrutore)
    {
        return view('/instrutores.edit')->with('instrutor', $instrutore);
    }

    public function update(Instrutores $instrutore, Request $request)
    {
        $instrutore->fill($request->all());
        $instrutore->save();

        return to_route('instrutores.index')->with('mensagem.sucesso', "Instrutor '{$instrutore->nome}' atualizado!");
    }

    public function __construct()
    {
        $this->middleware('auth');
    }
}
