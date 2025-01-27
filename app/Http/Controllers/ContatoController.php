<?php

namespace App\Http\Controllers;

use App\Models\Pessoa;
use Illuminate\Http\Request;

class ContatoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index() {
        $contatos = Pessoa::leftJoin('enderecos', 'pessoas.enderecos_id', 'enderecos.id')
        ->leftJoin('estados', 'enderecos.estados_id', 'estados.id')
        ->leftJoin('redes_sociais', 'pessoas.id', 'redes_sociais.pessoas_id')
        ->select('pessoas.nome as nome_pessoa', 'pessoas.celular as celular_pessoa', 'estados.nome as nome_estado', 'pessoas.sobrenome as sobrenome_pessoa', 'pessoas.apelido')
        ->get();

        return view('welcome', compact('contatos'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
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
