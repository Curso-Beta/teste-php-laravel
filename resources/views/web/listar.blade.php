<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <meta http-equiv="X-UA-Compatible" content="ie=edge">
   <link rel="stylesheet" href="{{ asset('css/app.css') }}">
   <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
   <title>Listar</title>
</head>
<body>
   
   <div class="container p-5 m-5 text-center">
       <h1>Lista de vagas</h1>
   </div>
   <div class="container">
       <a  class="btn btn-outline-success" href="{{ route('adicionar.vaga')}}" >Criar vaga</a>
   </div>

<div class="container informacao-pagina">
   <table class="table">      
       <thead>
        <tr>
           <th>Descrição</th>
           <th>Tipo</th>
           <th>Status</th>
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
            <td><a href="{{route('editar.vaga',$vaga->id)}}">Editar</a></td>  
            <td><a href="{{route('excluir.vaga',$vaga->id)}}">Excluir</a></td>
            </tr>  
         </tbody>            
         @endforeach
      @else
        <h1>No momento não há vagas aqui</h1>
      @endif
    </table>      
    <div class="col-lg-12">
      {{$vagas->appends($request)->links()}}
   </div>                  
             Exibindo {{$vagas->count()}} Vagas de {{$vagas->total()}} (de {{$vagas->firstItem()}} a {{$vagas->lastItem()}})} 

</div>
</body>
</html>