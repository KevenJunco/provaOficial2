<?php

namespace App\Http\Controllers;

use App\Imc;
use Illuminate\Http\Request;

class ImcController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $diagnostics = Imc::orderBy('id', 'DESC')->get();
        return view('diagnostics.index', [
            'titlePage' => 'Diagnósticos',
            'diagnostics' => $diagnostics
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('diagnostics.create', [
            'titlePage' => 'Calcule o IMC',
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // Novo objeto
        $imc = new Imc;

        // Dados do formulário
        $nome           = $request->input('nome');
        $peso           = number_format($request->input('peso'), 2);
        $altura         = number_format($request->input('altura'), 2);
        $diagnostico    = '';

        if (!($peso > 0) || !($altura > 0) || (strlen($nome) == 0)) {
            return 'O nome deve conter mais de um caracteres. Peso e altura devem ser maiores do que 0';
        }

        // Cálcula o IMC
        $resultado      = number_format( $peso / pow($altura, 2), 2);

        // Diagnóstico
        if ($resultado < 18.5) {
            $diagnostico = $this->formatDiagnostic($nome, $altura, $peso, $resultado, 'Magreza');
        } else if ($resultado >= 18.5 && $resultado < 24.9) {
            $diagnostico = $this->formatDiagnostic($nome, $altura, $peso, $resultado, 'Normal');
        } else if ($resultado >= 25 && $resultado < 29.9) {
            $diagnostico = $this->formatDiagnostic($nome, $altura, $peso, $resultado, 'Sobrepeso');
        } else if ($resultado >= 30 && $resultado < 39.9) {
            $diagnostico = $this->formatDiagnostic($nome, $altura, $peso, $resultado, 'Obesidade');
        } else if ($resultado > 40) {
            $diagnostico = $this->formatDiagnostic($nome, $altura, $peso, $resultado, 'Obesidade Grave');
        }  

        // Atribui as propriedades ao objeto do banco de dados
        $imc->nome          = $nome;
        $imc->peso          = $peso;
        $imc->altura        = $altura;
        $imc->resultado     = $resultado;
        $imc->diagnostico   = $diagnostico;

        $imc->save();

        return $imc->diagnostico;
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Imc  $imc
     * @return \Illuminate\Http\Response
     */
    public function show(Imc $imc)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Imc  $imc
     * @return \Illuminate\Http\Response
     */
    public function edit(Imc $imc)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Imc  $imc
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Imc $imc)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Imc  $imc
     * @return \Illuminate\Http\Response
     */
    public function destroy(Imc $imc)
    {
        //
    }
    // formatDiagnostic($nome, $altura, $peso, $resultado, 'Sobrepeso');
    public function formatDiagnostic($nome, $altura, $peso, $resultado, $classificacao)
    {
        return "Nome: {$nome}; Altura: {$altura} Peso: {$peso}; IMC: {$resultado}; Clasificacao: {$classificacao}";
    }
}
