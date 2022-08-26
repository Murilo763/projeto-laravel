<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Hash;
use App\Models\User;
use Auth;   

class RegistroController extends Controller
{
    public function create()
    {
        $mensagemErro = session('mensagem.erro');
        return view('registro.create', compact('mensagemErro'));
    }

    public function store(Request $request)
    {
        $data = $request->except('_token');
        $data['password'] = Hash::make($data['password']);
        if(User::whereEmail($data['email'])->get()->first()){
            return redirect()->route('registrar.create')->with('mensagem.erro', 'Email de Usuário já cadastrado!');
        }
        $user = User::create($data);

        Auth::login($user);

        return redirect()->route('instrutores.index');
    }
}
