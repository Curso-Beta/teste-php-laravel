<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <meta http-equiv="X-UA-Compatible" content="ie=edge">
   <link rel="stylesheet" href="{{ asset('css/app.css') }}">
   <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
   <title>Adm</title>
</head>
<body>
   <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
       <div class="container-fluid">
         <a class="navbar-brand" href="#">Vagas.Com</a>
         <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
           <span class="navbar-toggler-icon"></span>
         </button>
         <div class="collapse navbar-collapse" id="navbarSupportedContent">
           <ul class="navbar-nav me-auto mb-2 mb-lg-0">
           </ul>         
         </div>
       </div>
      <div class="navbar-nav me-auto mb-1 mb-lg-0">
      
       <a  href="{{route('logout.adm')}}" class="btn btn-dark p-2 m-2">sair</a>
      </div>
     </nav>
    <div>
       <li>
           <ul>
               <a class="btn btn-dark" href="{{route('listarVagas.adm')}}">Listar vagas</a>
           </ul>
           <ul>
               <a class="btn btn-dark" href="{{route('listarUsuarios')}}">Listar Candidatos</a>
           </ul>
       </li>
    </div>    


</body>
</html>