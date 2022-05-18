<?php

namespace App\Http\Controllers;

use App\Jogo;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class JogoController extends Controller
{
    public function index()
    {
        $usuario = User::find(Auth::id());

        if ($usuario->hasRole('desenvolvedor'))
            return redirect()->route('app.jogos.adicionar');

        $jogos = Jogo::paginate(5);
        return view('app.jogo.index', ['jogos' => $jogos]);
    }

    public function adicionar()
    {
        return view('app.jogo.adicionar');
    }

    public function cadastrar(Request $request) {
        $nomeArquivo = $request->file('arquivo')->getClientOriginalName();
        $nomePasta = pathinfo($nomeArquivo, PATHINFO_FILENAME);
        $path = $request->file('arquivo')->storeAs('public/jogos', $nomeArquivo);

        $jogo = new Jogo();
        $jogo->nome = $request->nome;
        $jogo->categoria = $request->categoria;
        $jogo->status = 'pendente';
        $jogo->caminho = $path;
        $jogo->nome_pasta = $nomePasta;
        $jogo->autor = $request->autor;
        $jogo->tutorial = $request->tutorial;

        $jogo->save();

        $msg = 'Jogo cadastrado com sucesso';

        return view('app.jogo.adicionar', ['msg' => $msg]);
    }

    public function aprovar($id)
    {
        $jogo = Jogo::find($id);
        $zipper = new \Madnest\Madzipper\Madzipper;
        $zip = $zipper->make(Storage::path($jogo->caminho));
        if ($zip) {
            $zip->extractTo(Storage::disk('public')->path('jogos_aprovados'));
            $zip->close();
        }

        $jogo->status = 'aprovado';
        $jogo->save();

        $msg = 'Jogo aprovado com sucesso';
        return redirect()->route('app.jogos')->with(['msg' => $msg]);
    }

    public function reprovar($id, Request $request)
    {
        $jogo = Jogo::find($id);
        $jogo->status = 'reprovado';
        $jogo->motivo_reprovacao = $request->motivo_reprovacao;
        $jogo->save();

        $msg = 'Jogo reprovado com sucesso';
        return redirect()->route('app.jogos')->with(['msg' => $msg]);
    }

    public function buscar($categoria)
    {
        $jogos = Jogo::where('categoria', $categoria)
            ->where('status','aprovado')
            ->paginate(5);

        return view('app.jogo.buscar', ['jogos' => $jogos]);
    }

    public function executar($jogo)
    {
        $jogo = Jogo::find($jogo);

        if (!$jogo)
            return redirect()->back();

        $acessos = $jogo->acessos;
        $jogo->acessos = $acessos + 1;
        $jogo->save();

        return view('app.jogo.executar', ['jogo' => $jogo]);
    }

    public function relatorio()
    {
        $jogos = Jogo::paginate(10);
        return view('app.jogo.relatorio', compact('jogos'));
    }

    public function maisjogados()
    {
        $jogos = Jogo::where('status','aprovado')
            ->orderByDesc('acessos')
            ->paginate(5);

        return view('app.jogo.mais_jogados', ['jogos' => $jogos]);
    }
}
