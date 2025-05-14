<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\View;
use Dompdf\Dompdf;
use Illuminate\Http\Request;

class RelatorioController extends Controller
{
    function emitirRelatorio(){
        $dompdf = new Dompdf();

        $dados = ['curso' =>'Análise e desenvolvimento de sistemas', 
        'alunos'=>['joao', 'luana', 'gaby'],
         'duração'=> 4];

        $html = View::make('relatorio.curso', $dados)->render();

        $dompdf->loadHtml($html);

        $dompdf->setPaper("A4", "landscape");

        $dompdf->render();

        $dompdf->stream();
    }
}
