<?php

namespace App\Http\Controllers;

use App\Models\Endereco;
use App\Models\Estado;
use App\Models\Pessoa;
use App\Models\RedeSocial;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ContatoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $search = request('search');
        $query = Pessoa::leftJoin('enderecos', 'pessoas.enderecos_id', 'enderecos.id')
            ->leftJoin('estados', 'enderecos.estados_id', 'estados.id')
            ->leftJoin('redes_sociais', 'pessoas.id', 'redes_sociais.pessoas_id')
            ->where('pessoas.users_id', Auth::id())
            ->select(
                'pessoas.nome as nome_pessoa',
                'pessoas.celular',
                'pessoas.fixo',
                'estados.nome as nome_estado',
                'pessoas.sobrenome',
                'pessoas.apelido',
                'pessoas.email',
                'pessoas.avatar',
                'pessoas.birthday',
                'pessoas.id as pessoa_id',
                'enderecos.rua',
                'enderecos.numero',
                'enderecos.cidade',
                'estados.sigla',
                'estados.id as estado_id',
                'enderecos.cep',
                'redes_sociais.id as redes_id'
            )
            ->orderByRaw("COALESCE(pessoas.apelido, pessoas.nome) ASC");

        if ($search) {
            $query->where('pessoas.nome', 'like', "%{$search}%")
                ->orWhere('pessoas.sobrenome', 'like', "%{$search}%")
                ->orWhere('pessoas.apelido', 'like', "%{$search}%")
                ->orWhere('pessoas.email', 'like', "%{$search}%")
                ->orWhere('pessoas.celular', 'like', "%{$search}%");
        }

        $contatos = $query->paginate(10);

        return view('welcome', compact('contatos', 'search'));
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
        // Upload endereço, se preenchido
        if ($request->input('rua')) {
            $request->validate([
                'rua'    => 'nullable|required_with:numero,cidade,uf,cep',
                'numero' => 'nullable|required_with:rua,cidade,uf,cep',
                'cidade' => 'nullable|required_with:rua,numero,uf,cep',
                'uf'     => 'nullable|required_with:rua,numero,cidade,cep',
                'cep'    => 'nullable|required_with:rua,numero,cidade,uf',
            ]);

            $endereco = new Endereco;
            $endereco->rua = $request->input('rua');
            $endereco->numero = $request->input('numero');
            $endereco->cidade = $request->input('cidade');
            $endereco->cep = $request->input('cep');
            $endereco->estados_id = $request->input('uf');
            $endereco->save();
            $pessoa->enderecos_id = $endereco->id;
        }

        // Upload avatar do contato
        if ($request->hasFile('avatar') && $request->file('avatar')->isValid()) {
            $requestImage = $request->file('avatar');
            $extension = $requestImage->extension();
            $imageName = md5($requestImage->getClientOriginalName() . strtotime("now")) . "." . $extension;
            $requestImage->move(public_path('img/avatares'), $imageName);
            $pessoa->avatar = 'img/avatares/' . $imageName;
        }

        // Dados do contato
        $pessoa->nome = $request->input('nome');
        $pessoa->sobrenome = $request->input('sobrenome');
        $pessoa->apelido = $request->input('apelido');
        $pessoa->birthday = $request->input('birthday');
        $pessoa->email = $request->input('email');
        $pessoa->celular = $request->input('celular');
        $pessoa->fixo = $request->input('fixo');
        $pessoa->users_id = Auth::id();
        $pessoa->save();

        // Salvar redes sociais (dados vindos do componente Livewire via input hidden "redes_sociais")
        $redesJson = $request->input('redes_sociais') ? $request->input('redes_sociais') : null;
        if ($request->input('redes_sociais')) {
            $redesArray = json_decode($redesJson, true);
            foreach ($redesArray as $rede) {
                $salvar_rede = new RedeSocial;
                $salvar_rede->nome = $rede['nome'];
                $salvar_rede->link = $rede['link'];
                $salvar_rede->pessoas_id = $pessoa->id;
                $salvar_rede->save();
            }
            // dd(json_decode($redesJson, true));
        }

        return redirect('/');
    }



    /**
     * Display the specified resource.
     */
    public function show()
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $contato = Pessoa::leftJoin('enderecos', 'pessoas.enderecos_id', 'enderecos.id')
            ->leftJoin('estados', 'enderecos.estados_id', 'estados.id')
            ->leftJoin('redes_sociais', 'pessoas.id', 'redes_sociais.pessoas_id')
            ->select(
                'pessoas.id as pessoa_id',
                'pessoas.nome as nome_pessoa',
                'pessoas.sobrenome',
                'pessoas.apelido',
                'pessoas.email',
                'pessoas.avatar',
                'pessoas.birthday',
                'pessoas.celular',
                'pessoas.fixo',
                'enderecos.rua',
                'enderecos.numero',
                'enderecos.cidade',
                'estados.sigla',
                'estados.id as estado_id',
                'enderecos.cep'
            )
            ->where('pessoas.id', $id)
            ->firstOrFail();

        $estados = Estado::all();

        return view('contacts.edit', compact('contato', 'estados'));
    }




    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        Pessoa::findOrFail($id)->update($request->all());

        return redirect('/');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Pessoa::findOrFail($id)->delete();

        return redirect('/');
    }
}
