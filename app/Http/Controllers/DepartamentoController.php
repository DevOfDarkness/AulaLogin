<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Departamento;

class DepartamentoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      //pega todas as instâncias do objeto
      $departamentos = Departamento::all();

      return response()->json([$departamentos]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //cria uma nova instância
        $departamento = new Departamento;

        //passa os dados do argumento para instância
        $departamento->codigo = $request->codigo;
        $departamento->nome = $request->nome;
        $departamento->email = $request->email;
        $departamento->pagina = $request->pagina;
        $departamento->telefone = $request->telefone;

        //salva
        $departamento->save();

        return response()->json([$departamento]);

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //encontra a instância desejada e atribui
        $departamento = Departamento::find($id);

        return response()->json([$departamento]);

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //encontra o id desejado
        $departamento = Departamento::find($id);

        //alteras os dados quando aplicável
        if($request->nome) {
          $departamento->nome = $request->nome;
        }
        if($request->codigo) {
          $departamento->codigo = $request->codigo;
        }
        if($request->email) {
          $departamento->email = $request->email;
        }
        if($request->pagina) {
          $departamento->pagina = $request->pagina;
        }
        if($request->telefone) {
          $departamento->telefone = $request->telefone;
        }

        //salva
        $departamento->save();

        return response()->json([$departamento]);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Departamento::destroy($id);

        return response()->json(['message' => 'Instância deletada com sucesso']);
    }
}
