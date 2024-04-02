{{-- php artisan storage:link --}}

@extends('layout')
@section('content')
    <div class="jumbotrom d-flex justify-content-around flex-row">
        <div class="w-50">
            <img src="{{ asset('storage/imgs/instruments.jpg') }}" alt="" />
        </div>
        <div class="w-50">
            <h3>Bem-vindo ao quiz de Música! Boa sorte para você</h3>
            <button type="button" class="btn btn-info"> <a href="/inicio">Começe aqui</a></button>
        </div>
    </div>
@endsection
