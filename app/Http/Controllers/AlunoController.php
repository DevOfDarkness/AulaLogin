<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Aluno;

class AlunoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      //pega todas as instâncias do objeto
      $alunos = Aluno::all();

      return response()->json([$alunos]);
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
        $aluno = new Aluno;

        //passa os dados do argumento para instância
        $aluno->nome = $request->nome;
        $aluno->cpf = $request->cpf;
        $aluno->email = $request->email;
        $aluno->matricula = $request->matricula;
        $aluno->dataNascimento = $request->dataNascimento;
        $aluno->telefone = $request->telefone;
        $aluno->celular = $request->celular;
        $aluno->cr = $request->cr;
        $aluno->idCurso = $request->idCurso;

        //salva
        $aluno->save();

        return response()->json([$aluno]);

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
        $aluno = Aluno::find($id);

        return response()->json([$aluno]);

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
        $aluno = Aluno::find($id);

        //alteras os dados quando aplicável
        if($request->nome) {
          $aluno->nome = $request->nome;
        }
        if($request->cpf) {
          $aluno->cpf = $request->cpf;
        }
        if($request->email) {
          $aluno->email = $request->email;
        }
        if($request->matricula) {
          $aluno->matricula = $request->matricula;
        }
        if($request->dataNascimento) {
          $aluno->dataNascimento = $request->dataNascimento;
        }
        if($request->telefone) {
          $aluno->telefone = $request->telefone;
        }
        if($request->celular) {
          $aluno->celular = $request->celular;
        }
        if($request->cr) {
          $aluno->cr = $request->cr;
        }
        if($request->idCurso) {
          $aluno->idCurso = $request->idCurso;
        }

        //salva
        $aluno->save();

        return response()->json([$aluno]);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Aluno::destroy($id);

        return response()->json(['message' => 'Instância deletada com sucesso']);
    }
}
