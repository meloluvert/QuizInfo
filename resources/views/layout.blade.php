<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    @vite (['resources/js/app.js'])
</head>
<body>
    <ul class="nav justify-content-end">

        
    <div class="cover-container d-flex w-100 h-100 p-3 mx-auto flex-column">
      <header class="masthead mb-auto">
        <div class="inner">
          <nav class="nav nav-masthead d-flex justify-content-around">

            <img src="{!! asset('resources/img/logo.png')!!}" />
            <a class="nav-link active" href="#">Home</a>
            <a class="nav-link" href="#">Features</a>
            <a class="nav-link" href="#">Contatos</a>
          </nav>
        </div>
      </header>
    @hasSection ('content')
        @yield('content')
    @endif
</body>
</html>