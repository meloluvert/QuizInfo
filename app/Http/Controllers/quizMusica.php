<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class quizMusica extends Controller
{
    private $perguntas = array();
    

    public function __construct(){
        $this->perguntas['1'] = 'A';
        $this->perguntas['2'] = 'A';
        $this->perguntas['3'] = 'B';

        $this->perguntas['4'] = 'D';
        $this->perguntas['5'] = 'C';
        $this->perguntas['6'] = 'D';
        $this->perguntas['7'] = 'C';
        $this->perguntas['8'] = 'C';
        $this->perguntas['9'] = 'B';
        $this->perguntas['10'] = 'B';

       
    }
    public function index(){
        session(['acertos' => 0]);
        $allQuestions = array();
        $allQuestions[1]['titulo'] = 'Qual das alternativas apresenta somente compositores populares brasileiros?';
        $allQuestions[1]['op'][1] = 'Chiquinha Gonzaga, Ernesto Nazareth e Villa-Lobos';
        $allQuestions[1]['op'][2] = 'Pixinguinha, Ary Barroso e Cartola ';
        $allQuestions[1]['op'][3] = 'Heitor Villa-Lobos, Bach e Beethoven ';
        $allQuestions[1]['op'][4] = 'Luiz Gonzaga, Mozart e Chopin';
        $number = 1;

        return view ('quiz', compact('allQuestions','number'));
    }
     function dadosPagina(Request $dados){
        

        



        $numQuiz = $dados->input('numQuiz');
        $resposta = $dados->input('pergunta');
        session(['r'.$numQuiz => $resposta]);
        if(strcmp($this->perguntas[strval($numQuiz)],  $resposta) == 0){
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
            $allQuestions[2]['titulo'] = ' Qual das alternativas apresenta somente andamentos lentos?
            ';
            $allQuestions[2]['op'][1] = 'Adagio, Largo';
            $allQuestions[2]['op'][2] = 'Moderato, Andante';
            $allQuestions[2]['op'][3] = 'Allegro, Vivace';
            $allQuestions[2]['op'][4] = 'Presto, Allegretto';

            $allQuestions[3]['titulo'] = 'Qual intervalo é formado pela distância de quatro notas em uma escala musical maior?';
            $allQuestions[3]['op'][1] = 'Terça maior';
            $allQuestions[3]['op'][2] = 'Quarta justa';
            $allQuestions[3]['op'][3] = 'Quinta justa';
            $allQuestions[3]['op'][4] = 'Sexta maior';

            $allQuestions[4]['titulo'] = 'Qual acorde é formado pela sobreposição das notas dó, mi e sol em uma tonalidade de dó maior?';
            $allQuestions[4]['op'][1] = 'Em';
            $allQuestions[4]['op'][2] = 'G';
            $allQuestions[4]['op'][3] = 'F';
            $allQuestions[4]['op'][4] = 'C';
    
            $allQuestions[5]['titulo'] = 'Qual é a principal diferença entre um compasso composto e um compasso simples?';
            $allQuestions[5]['op'][1] = 'O compasso simples contém mais de um tempo forte, enquanto o compasso composto contém apenas um tempo forte.';
            $allQuestions[5]['op'][2] = 'O compasso composto é caracterizado pela presença de mais de um ritmo, enquanto o compasso simples possui um único ritmo predominante.';
            $allQuestions[5]['op'][3] = 'O compasso composto contém subdivisões ternárias, enquanto o compasso simples contém subdivisões binárias.';
            $allQuestions[5]['op'][4] = 'O compasso simples é usado em músicas lentas, enquanto o compasso composto é usado em músicas rápidas.';
    
            $allQuestions[6]['titulo'] = 'Qual é o termo usado para indicar a velocidade de uma peça musical?';
            $allQuestions[6]['op'][1] = 'Staccato';
            $allQuestions[6]['op'][2] = 'Crescendo';
            $allQuestions[6]['op'][3] = 'Legato';
            $allQuestions[6]['op'][4] = 'Andamento';

            $allQuestions[7]['titulo'] = 'Quem compôs a famosa obra "Ode à Alegria", que faz parte da Nona Sinfonia?';
            $allQuestions[7]['op'][1] = 'Wolfgang Amadeus Mozart';
            $allQuestions[7]['op'][2] = 'Johann Sebastian Bach';
            $allQuestions[7]['op'][3] = 'Ludwig van Beethoven';
            $allQuestions[7]['op'][4] = 'Franz Schubert';

            $allQuestions[8]['titulo'] = 'Qual é o nome do intervalo entre duas notas musicais que têm o mesmo nome, mas uma é mais alta do que a outra?';
            $allQuestions[8]['op'][1] = 'Tom';
            $allQuestions[8]['op'][2] = 'Semitom';
            $allQuestions[8]['op'][3] = 'Oitava';
            $allQuestions[8]['op'][4] = 'Uníssono';

            $allQuestions[9]['titulo'] = 'Qual é o nome das linhas nas quais as notas são escritas em uma partitura?';
            $allQuestions[9]['op'][1] = 'Linhas de ritmo ';
            $allQuestions[9]['op'][2] = 'Pautas ou pentagramas  ';
            $allQuestions[9]['op'][3] = 'Linhas melódicas ';
            $allQuestions[9]['op'][4] = 'Linhas harmônicas ';

            $allQuestions[10]['titulo'] = 'Quais são os três elementos da música?';
            $allQuestions[10]['op'][1] = 'Altura, intensidade, duração';
            $allQuestions[10]['op'][2] = 'Melodia, harmonia, ritmo';
            $allQuestions[10]['op'][3] = 'Dinâmica, tessitura, articulação';
            $allQuestions[10]['op'][4] = 'Melodia, contraponto, textura';


    $number = $numQuiz+1;
            return view ('quiz', compact('allQuestions','number'));
        }else{
            $final = array();

            for($i = 1; $i<=10;$i++){
                $final[$i]['gabarito'] = $this->perguntas[strval($i)];
                $final[$i]['resposta'] = session('resposta'.$i);
                $final[$i]['resultado'] =session('resultado'.$i);
            }
            $acertos = session('acertos');

            if($acertos == 10) {
                $final['mensagem'] = "Excelente!! Você acertou todas!! Você é um músico!!";
            } else if($acertos > 7) {
                $final['mensagem'] = "Muito bom!! Você acertou " . $acertos . " de 10!! Parabéns!!";
            } else if($acertos > 5) {
                $final['mensagem'] = "Você conhece o mínimo de música!! Mas pode melhorar. Você acertou " . $acertos . " de 10.";
            } else if($acertos == 5) {
                $final['mensagem'] = "Você acertou 50% do teste!! Está de recuperação, estude mais!!";
            } else {
                $final['mensagem'] = "Precisa estudar mais música! Você acertou " . $acertos . " de 10.";
            }
            
            return view ('resultado', compact('final') );
        }
    }
}
