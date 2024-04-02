{{-- php artisan storage:link --}}

@extends('layout')
@section('content')
    <div class="jumbotrom d-flex justify-content-around flex-row">
        <div class="w-50">
            <img src="{{ asset('storage/imgs/instruments.jpg') }}" alt="" />
        </div>
        <div class="w-50 flex-column ">
            <div class =" row">
                    <div class =" col -md -4 text - center "> <strong> Gabarito </strong> </div>
                <div class =" col -md -4 text - center "> <strong> Resposta </strong> </div>
                <div class =" col -md -4 text - center "> <strong> Resultado </strong> </div>
            </div>
            @for ($k = 1; $k <= 10; $k++)
                <div class =" row">
                    <div class =" col -md -4 text - center "> {{ $final[$k]['gabarito'] }} </div>
                    <div class =" col -md -4 text - center "> {{ $final[$k]['resposta'] }} </div>
                    <div class =" col -md -4 text - center "> {{ $final[$k]['resultado'] }} </div>
                </div>
            @endfor
            <div class="row text-center py-4">
                <div class="col-md-12 h4"><strong>{{ $final["mensagem"] }}</strong></div>
    
                <button onclick="window.location.href='/';" type="button" class="btn btn-primary btn-inline"> Voltar ao início</button>
            </div>
        </div>
        
        
        
    </div>
@endsection
