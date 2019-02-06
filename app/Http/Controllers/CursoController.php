<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CursoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      //pega todas as instâncias do objeto
      $cursos = Curso::all();

      return response()->json([$cursos]);
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
        $curso = new Curso;

        //passa os dados do argumento para instância
        $curso->codigo = $request->codigo;
        $curso->nome = $request->nome;
        $curso->duracaoEmSegmentos = $request->duracaoEmSegmentos;
        $curso->pagina = $request->pagina;
        $curso->anoFundacao = $request->anoFundacao;
        $curso->totalCreditos = $request->totalCreditos;
        $curso->idDepartamento = $request->idDepartamento;

        //salva
        $curso->save();

        return response()->json([$curso]);

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
        $curso = Curso::find($id);

        return response()->json([$curso]);

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
        $curso = Curso::find($request->id);

        //alteras os dados quando aplicável
        if($request->nome) {
          $curso->nome = $request->nome;
        }
        if($request->codigo) {
          $curso->codigo = $request->codigo;
        }
        if($request->duracaoEmSegmentos) {
          $curso->duracaoEmSegmentos = $request->duracaoEmSegmentos;
        }
        if($request->pagina) {
          $curso->pagina = $request->pagina;
        }
        if($request->anoFundacao) {
          $curso->anoFundacao = $request->anoFundacao;
        }
        if($request->totalCreditos) {
          $curso->totalCreditos = $request->totalCreditos;
        }
        if($request->idDepartamento) {
          $curso->idDepartamento = $request->idDepartamento;
        }

        //salva
        $curso->save();

        return response()->json([$curso]);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Curso::destroy($request->id);

        return resonse()->json(['message' => 'Instância deletada com sucesso']);
    }
}
