@extends('layout')
@section('content')
<div class="jumbotrom d-flex justify-content-around flex-row">
    <div class="w-50">
        <img src="{{ asset('storage/imgs/instruments.jpg') }}" alt="" />
    </div>      
    <form action="" class="w-50">
        @csrf
        <div class="form-check">
            <input class="form-check-input" type="radio" name="flexRadioDefault" value="A" id="flexRadioDefault1">
            <label class="form-check-label" for="flexRadioDefault1">
              A
            </label>
          </div>
          <div class="form-check">
            <input class="form-check-input" type="radio" name="flexRadioDefault" value="B" id="flexRadioDefault2" >
            <label class="form-check-label" for="flexRadioDefault2">
              B
            </label>
          </div>

        <button type="button" class="btn btn-primary">Enviar Resposta</button>
    </form>
</div>
@endsection