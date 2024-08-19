{{-- php artisan storage:link --}}

@extends('layout')
@section('content')

    <div class="jumbotrom d-flex justify-content-around flex-row">
        <div class="w-50">
            <img class=" mh-100" src="{{ asset('storage/imgs/sala.jpeg') }}" style="max-width: 80%" />
        </div>
        <div class="w-50">
            <h3>Bem-vindo ao quiz do Informático! Boa sorte para você</h3>
            <button type="button" class="btn btn-info"> <a href="/inicio">Começe aqui</a></button>
        </div>
    </div>
@endsection
