<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class quizInformatica extends Controller
{
    private $perguntas = array();
    
    public function __construct(){
        $this->perguntas['1'] = 'C';
        $this->perguntas['2'] = 'A';
        $this->perguntas['3'] = 'C';
        $this->perguntas['4'] = 'A';
        $this->perguntas['5'] = 'B';
        $this->perguntas['6'] = 'C';
        $this->perguntas['7'] = 'A';
        $this->perguntas['8'] = 'B';
        $this->perguntas['9'] = 'C';
        $this->perguntas['10'] = 'B';
    }

    public function index(){
        session(['acertos' => 0]);
        $allQuestions = array();
        $allQuestions[1]['titulo'] = 'Qual abaixo não é um sistema operacional?';
        $allQuestions[1]['op'][1] = 'Linux';
        $allQuestions[1]['op'][2] = 'Windows';
        $allQuestions[1]['op'][3] = 'React';
        $allQuestions[1]['op'][4] = 'macOS';
        $number = 1;

        return view('quiz', compact('allQuestions', 'number'));
    }

    function dadosPagina(Request $dados){
        $numQuiz = $dados->input('numQuiz');
        $resposta = $dados->input('pergunta');
        session(['r'.$numQuiz => $resposta]);
        
        if(strcmp($this->perguntas[strval($numQuiz)], $resposta) == 0){
            $acertos = session('acertos');
            $acertos++;
            session(['acertos' => $acertos]);
            session(['resposta'.$numQuiz => $resposta]);
            session(['resultado'.$numQuiz => 'Acertou']);
        }else{
            session(['resultado'.$numQuiz => 'Errou']);
        }

        if($numQuiz != 10){
            $allQuestions = array();
            $allQuestions[2]['titulo'] = 'Quanto é 5 na base binária?';
            $allQuestions[2]['op'][1] = '101';
            $allQuestions[2]['op'][2] = '110';
            $allQuestions[2]['op'][3] = '1001';
            $allQuestions[2]['op'][4] = '111';

            $allQuestions[3]['titulo'] = 'Qual dessas não é uma linguagem de programação?';
            $allQuestions[3]['op'][1] = 'Python';
            $allQuestions[3]['op'][2] = 'Java';
            $allQuestions[3]['op'][3] = 'HTML';
            $allQuestions[3]['op'][4] = 'C++';

            $allQuestions[4]['titulo'] = 'Qual o formato de um IPv4?';
            $allQuestions[4]['op'][1] = '192.168.1.1';
            $allQuestions[4]['op'][2] = '2001:0db8:85a3:0000:0000:8a2e:0370:7334';
            $allQuestions[4]['op'][3] = 'www.exemplo.com';
            $allQuestions[4]['op'][4] = '1234:5678:9abc:def0';

            $allQuestions[5]['titulo'] = 'Qual dessas é considerada uma estrutura de dados?';
            $allQuestions[5]['op'][1] = 'Lista';
            $allQuestions[5]['op'][2] = 'Árvore binária';
            $allQuestions[5]['op'][3] = 'Arquivo de texto';
            $allQuestions[5]['op'][4] = 'Algoritmo';

            $allQuestions[6]['titulo'] = 'O que é um backbone?';
            $allQuestions[6]['op'][1] = 'Uma parte da placa-mãe';
            $allQuestions[6]['op'][2] = 'Um cabo de fibra ótica';
            $allQuestions[6]['op'][3] = 'A estrutura principal de uma rede';
            $allQuestions[6]['op'][4] = 'Um tipo de processador';

            $allQuestions[7]['titulo'] = 'Qual dessas portas é usada para o protocolo HTTP?';
            $allQuestions[7]['op'][1] = '80';
            $allQuestions[7]['op'][2] = '22';
            $allQuestions[7]['op'][3] = '25';
            $allQuestions[7]['op'][4] = '443';

            $allQuestions[8]['titulo'] = 'O que significa a sigla RAM?';
            $allQuestions[8]['op'][1] = 'Read Access Memory';
            $allQuestions[8]['op'][2] = 'Random Access Memory';
            $allQuestions[8]['op'][3] = 'Real Access Memory';
            $allQuestions[8]['op'][4] = 'Rapid Access Memory';

            $allQuestions[9]['titulo'] = 'Qual das seguintes opções não é um sistema de gerenciamento de banco de dados (SGBD)?';
            $allQuestions[9]['op'][1] = 'MySQL';
            $allQuestions[9]['op'][2] = 'MongoDB';
            $allQuestions[9]['op'][3] = 'Microsoft Excel';
            $allQuestions[9]['op'][4] = 'PostgreSQL';

            $allQuestions[10]['titulo'] = 'O que é um laço de repetição (loop)?';
            $allQuestions[10]['op'][1] = 'Uma função que imprime valores na tela';
            $allQuestions[10]['op'][2] = 'Um comando que permite repetir um bloco de código várias vezes';
            $allQuestions[10]['op'][3] = 'Uma estrutura de dados para armazenar valores';
            $allQuestions[10]['op'][4] = 'Um erro de programação que para a execução do código';

            $number = $numQuiz + 1;
            return view('quiz', compact('allQuestions', 'number'));
        }else{
            $final = array();

            for($i = 1; $i <= 10; $i++){
                $final[$i]['gabarito'] = $this->perguntas[strval($i)];
                $final[$i]['resposta'] = session('resposta'.$i);
                $final[$i]['resultado'] = session('resultado'.$i);
            }
            $acertos = session('acertos');

            if($acertos == 10) {
                $final['mensagem'] = "Excelente!! Você acertou todas!! Você é um expert em informática!!";
            } else if($acertos > 7) {
                $final['mensagem'] = "Muito bom!! Você acertou " . $acertos . " de 10!! Parabéns!!";
            } else if($acertos > 5) {
                $final['mensagem'] = "Você conhece o mínimo de informática!! Mas pode melhorar. Você acertou " . $acertos . " de 10.";
            } else if($acertos == 5) {
                $final['mensagem'] = "Você acertou 50% do teste!! Está de recuperação, estude mais!!";
            } else {
                $final['mensagem'] = "Precisa estudar mais informática! Você acertou " . $acertos . " de 10.";
            }
            
            return view('resultado', compact('final'));
        }
    }
}
