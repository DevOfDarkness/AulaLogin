<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Professor;

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
      $professores = Professor::all();

      return response()->json([$professores]);
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
        $professor = new Professor;

        //passa os dados do argumento para instância
        $professor->nome = $request->nome;
        $professor->cpf = $request->cpf;
        $professor->email = $request->email;
        $professor->pagina = $request->pagina;
        $professor->telefone = $request->telefone;
        $professor->idDepartamento = $request->idDepartamento;

        //salva
        $professor->save();

        return response()->json([$professor]);

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
        $professor = Professor::find($id);

        return response()->json([$professor]);

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
        $professor = Professor::find($id);

        //alteras os dados quando aplicável
        if($request->nome) {
          $professor->nome = $request->nome;
        }
        if($request->cpf) {
          $professor->cpf = $request->cpf;
        }
        if($request->email) {
          $professor->email = $request->email;
        }
        if($request->pagina) {
          $professor->pagina = $request->pagina;
        }
        if($request->telefone) {
          $professor->telefone = $request->telefone;
        }
        if($request->idDepartamento) {
          $professor->idDepartamento = $request->idDepartamento;
        }

        //salva
        $professor->save();

        return response()->json([$professor]);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Professor::destroy($id);

        return response()->json(['message' => 'Instância deletada com sucesso']);
    }
}
