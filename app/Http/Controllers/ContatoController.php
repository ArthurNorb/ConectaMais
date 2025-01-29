<?php

namespace App\Http\Controllers;

use App\Models\Endereco;
use App\Models\Estado;
use App\Models\Pessoa;
use Illuminate\Http\Request;

class ContatoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $contatos = Pessoa::leftJoin('enderecos', 'pessoas.enderecos_id', 'enderecos.id')
            ->leftJoin('estados', 'enderecos.estados_id', 'estados.id')
            ->leftJoin('redes_sociais', 'pessoas.id', 'redes_sociais.pessoas_id')
            ->select('pessoas.nome as nome_pessoa', 'pessoas.celular', 'estados.nome as nome_estado', 'pessoas.sobrenome', 'pessoas.apelido', 'pessoas.email', 'pessoas.avatar', 'pessoas.birthday')
            ->get();

        return view('welcome', compact('contatos'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $estados = Estado::all();
        return view('contacts.create', compact('estados'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $pessoa = new Pessoa;
        $endereco = new Endereco;

        $pessoa->avatar = $request->input('avatar');
        $pessoa->nome = $request->input('nome');
        $pessoa->sobrenome = $request->input('sobrenome');
        $pessoa->apelido = $request->input('apelido');
        $pessoa->birthday = $request->input('birthday');
        $pessoa->email = $request->input('email');
        $pessoa->celular = $request->input('celular');
        $pessoa->fixo = $request->input('fixo');
        $pessoa->save();

        if ($request->input('rua')) {
            $endereco->rua = $request->input('rua');
            $endereco->numero = $request->input('numero');
            $endereco->cidade = $request->input('cidade');
            $endereco->cep = $request->input('cep');
            $endereco->estados_id = $request->input('uf');
            $endereco->save();
        }

        return redirect('/');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
