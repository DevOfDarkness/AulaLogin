<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProfessorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      //pega todas as instâncias do objeto
      $Professores = Professor::all();

      return response()->json([$Professores]);
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
        $Professor = new Professor;

        //passa os dados do argumento para instância
        $Professor->nome = $request->nome;
        $Professor->cpf = $request->cpf;
        $Professor->email = $request->email;
        $Professor->pagina = $request->pagina;
        $Professor->telefone = $request->telefone;
        $Professor->idDepartamento = $request->idDepartamento;

        //salva
        $Professor->save();

        return response()->json([$Professor]);

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
        $Professor = Professor::find($id);

        return response()->json([$Professor]);

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
        $Professor = Professor::find($request->id);

        //alteras os dados quando aplicável
        if($request->nome) {
          $Professor->nome = $request->nome;
        }
        if($request->cpf) {
          $Professor->cpf = $request->cpf;
        }
        if($request->email) {
          $Professor->email = $request->email;
        }
        if($request->pagina) {
          $Professor->pagina = $request->pagina;
        }
        if($request->telefone) {
          $Professor->telefone = $request->telefone;
        }
        if($request->idDepartamento) {
          $Professor->idDepartamento = $request->idDepartamento;
        }

        //salva
        $Professor->save();

        return response()->json([$Professor]);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Professor::destroy($request->id);

        return resonse()->json(['message' => 'Instância deletada com sucesso']);
    }
}
