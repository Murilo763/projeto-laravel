<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Instrutores;

class InstrutoresController extends Controller
{
    public function index(Request $request)
    {
        $instrutores = Instrutores::all();
        $mensagemSucesso = session('mensagem.sucesso');
        
        return view('instrutores.index')->with('instrutores', $instrutores)->with('mensagemSucesso', $mensagemSucesso);
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
}
