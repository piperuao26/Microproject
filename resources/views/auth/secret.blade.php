<!doctype html>
<html>
<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title> Pagina Privada </title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" crossorigin="anonymous" />
  <link href="{{ asset('/css/app.css') }}" rel="stylesheet" />
</head> 

<body>
    <div class ="container" >
        <header class= "d-flex flex-wrap align-items-center justify-content-md-between py-3 mb-4 border-bottom">
            <a class= "d-flex align-items-center col-md-3 mb-2 mb-md-0 text-dark text-decoration-none">
                Pagina privada
             </a>
            <div class= "col-md-3 text-end">
                <a href= "{{route('logout')}}"><button type="button"
                class="btn btn-outline-primary me-2">Salir</button></a>
            </div>
        </header>
    </div>
    <article class= "container">
        <h2> Tu seccion privada </h2>
    </article>
</body>
</html>
    

