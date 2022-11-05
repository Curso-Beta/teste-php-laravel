
  <!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <meta http-equiv="X-UA-Compatible" content="ie=edge">
   <link rel="stylesheet" href="{{ asset('css/app.css') }}">
   <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
   <title>Home</title>
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
        <a  href="{{route('login.sair')}}" class="btn btn-dark p-2 m-2">sair</a>
       </div>
      </nav>

   
   <div class="container p-5 m-5 text-center">
       <h1>Lista de vagas</h1>
      <p> {{ isset($msg) ?  $msg : ''}}</p>
   </div>
   
<div class="container informacao-pagina">
   <table class="table">
       <thead>
        <tr>
           <th>Descrição</th>
           <th>Tipo</th>
           <th>Status</th>
           <th>Salario</th>
    
           <th></th>
           <th></th>
        </tr>
       </thead>
      @if($vagas)
      @foreach ($vagas as $vaga)
      <tbody>
         <tr>
           <td>{{$vaga->descricao}}</td>
           <td>{{$vaga->tipo}}</td>
           <td>{{$vaga->status}}</td>  
           <td>{{$vaga->salario}}</td>       
           <td><a class="btn btn-outline-success" href="{{route('app.candidatura',["status"=>$vaga->status,"id_vaga"=>$vaga->id,"candidato"=>$_SESSION['nome']])}}">Candidatar</a></td>  
           
         </tr>  
      </tbody>
       @endforeach
        @else
        <h1>No momento não há vagas aqui</h1>
        @endif
    </table>        
            {{$vagas->appends($request)->links()}}   
            Exibindo {{$vagas->count()}} Vagas de {{$vagas->total()}} (de {{$vagas->firstItem()}} a {{$vagas->lastItem()}})
            
</div>


</body>
</html>  