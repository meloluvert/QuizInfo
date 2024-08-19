<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>INFORMÁTICA</title>

<link rel="shortcut icon" href="{{ asset('storage/imgs/icone.png') }}" type="image/x-icon">    
    @vite (['resources/js/app.js'])
</head>
<body>
    <ul class="nav justify-content-end">

        
    <div class="cover-container d-flex w-100 h-100 p-3 mx-auto flex-column">
      <header class="masthead mb-3">
        <div class="inner">
          <nav class="nav nav-masthead d-flex justify-content-around" style="height: 100px">

            <img class=" mh-100" src="{{ asset('storage/imgs/servidor.png') }}" />
          </nav>
        </div>
      </header>
    @hasSection ('content')
        @yield('content')
    @endif
</body>


</html>