@extends('layout')
@section('content')
<div class="jumbotrom d-flex justify-content-around flex-row">
    <div class="w-50">
        <img src="{{ asset('storage/imgs/instruments.jpg') }}" alt="" style="max-width: 100%" />
    </div>      
    <form action="{{route('dadosPagina')}}" class="p-3 w-50 display-6"" method="POST">
        @csrf

        {{$number}}.{{$allQuestions[$number]['titulo']}}
        <input type="hidden" name="numQuiz" value="{{$number}}">
        <div class="form-check">

            <input class="form-check-input" type="radio" name="pergunta" value="A" id="flexRadioDefault1">
            <label class="form-check-label" for="flexRadioDefault1">
                {{{$allQuestions[$number]['op'][1]}}}
            </label>
          </div>
          <div class="form-check">
            <input class="form-check-input" type="radio" name="pergunta" value="B" id="flexRadioDefault2" >
            <label class="form-check-label" for="flexRadioDefault2">
                
                {{{$allQuestions[$number]['op'][2]}}}

              
            </label>
          </div>
          <div class="form-check">
            <input class="form-check-input" type="radio" name="pergunta" value="C" id="flexRadioDefault3" >
            <label class="form-check-label" for="flexRadioDefault3">
                
                {{{$allQuestions[$number]['op'][3]}}}
            </label>
          </div>
          <div class="form-check">
            <input class="form-check-input" type="radio" name="pergunta" value="D" id="flexRadioDefault4" >
            <label class="form-check-label" for="flexRadioDefault4">
                
                {{{$allQuestions[$number]['op'][4]}}}
            </label>
          </div>

        <button type="submit" class="btn btn-primary">Enviar Resposta</button>
    </form>
</div>
@endsection