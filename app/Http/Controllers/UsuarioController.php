<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UsuarioController extends Controller
{
    public function adicionar()
    {
        return view('app.login.adicionar');
    }

    public function cadastrar(Request $request)
    {
        $regras = [
            'name' => 'required|min:3|max:40',
            'password' => 'required',
            'email' => 'email'
        ];

        $feedback = [
            'required' => 'O campo deve ser preenchido',
            'name.min' => 'O campo nome deve ter no minimo 3 caractérs',
            'name.max' => 'O campo nome deve ter no maximo 40 caractérs',
            'email.email' => 'email não foi preenchido corretamente'
        ];

        $data = $request->validate($regras, $feedback);
        $usuario =  User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
        ]);

        if ($request->tipo_usuario == 'desenvolvedor') {
            $usuario->assignRole('desenvolvedor');
        } else if ($request->tipo_usuario == 'usuario_normal') {
            $usuario->assignRole('usuario_normal');
        }

        $msg = "Usuário cadastrado com sucesso";

        return redirect()->back()->with(['msg' => $msg]);
    }

    public function consultar(Request $request)
    {
        $users = User::where('name', 'like', '%'.$request->input('name').'%')
        ->where('email', 'like', '%'.$request->input('email').'%')
        ->get();

        return view('app.login.listar', ['users'=> $users]);
    }

    public function editar($id)
    {
        $user = User::find($id);
        return view('app.login.editar', ['user'=> $user]);
    }

    public function atualizar($id, Request $request)
    {
        $user = User::find($id);
        $data = $request->all();
        if ($data['password']) {
            $data['password'] = Hash::make($data['password']);
        } else {
            unset($data['password']);
        }

        $user->update($data);
        $msg = "Usuario atualizado com sucesso";
        return redirect()->route('app.principal')->with(['msg' => $msg]);
    }

    public function excluir($id)
    {
        User::find($id)->forceDelete();
        return redirect()->route('app.principal');
    }
}
