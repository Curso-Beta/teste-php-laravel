<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <meta http-equiv="X-UA-Compatible" content="ie=edge">
   <link rel="stylesheet" href="{{ asset('css/app.css') }}">
   <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
   <title>Lista de candidatos</title>
</head>
<body>
   
   <div class="container p-5 m-5 text-center">
       <h1>Lista de Canditos
         <span><a class="btn btn-dark" href="{{route('home.adm')}}">Voltar</a></span> 
       </h1>       
   </div>
 
<div class="container informacao-pagina">
   <table class="table">
       <thead>
        <tr>
           <th>Nome</th>
           <th>Email</th>
           <th>Telefone</th>
           <th>Data de inscrição</th>
           <th>Data de Atualização</th>
           <th></th>
           <th></th>
        </tr>
       </thead>
       @foreach ($candidatos as $candidato)
       <tbody>
          <tr>
            <td>{{$candidato->nome}}</td>
            <td>{{$candidato->email}}</td>
            <td>{{$candidato->telefone}}</td> 
            <td>{{$candidato->created_at}}</td>   
            <td>{{$candidato->updated_at}}</td>   
            
            <td><a class="btn btn-outline-info" href="{{route('editarUsuarios',$candidato->id)}}">Editar</a></td>  
            <td><a class="btn btn-outline-danger" href="{{route('excluirUsuariosId',$candidato->id)}}">Excluir</a></td> 
          </tr>  
       </tbody>    
        @endforeach
    </table>
       
        
   <div class="py-2">
         <p>{{$candidatos->appends($request)->links()}}</p>  
         Exibindo {{$candidatos->count()}} Vagas de {{$candidatos->total()}} (de {{$candidatos->firstItem()}} a {{$candidatos->lastItem()}})  
   </div>           
</div>
</body>
</html>