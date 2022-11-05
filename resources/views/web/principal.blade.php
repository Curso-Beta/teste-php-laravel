<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <title>Home</title>
</head>
<body>
     
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container-fluid">
      <a class="navbar-brand" href="#">Vagas.com</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        </ul>         
      </div>
    </div>
   <div class="navbar-nav me-auto mb-1 mb-lg-0">
    <a  href="{{route('login.index')}}" class="btn btn-dark p-2 m-2">Login</a>
    <a  href="{{route('index.form')}}" class="btn btn-dark p-2 m-2">Cadastro</a>
   </div>
  </nav>

  <div class="container">
    <div class="container  mt-5 p-5"> 
        <h1>Sua vaga esta aqui veja <span>Veja algumas delas e faça logo seu cadastro </span></h1>
    </div>
    <div class="container informacao-pagina">
        <table class="table table-borderless">          
              @if ($vagas)
              <thead>
                <tr>
                   <th>Descrição da vaga</th>
                   <th>Tipo de contratação</th> 
                   <th>Salario</th>                            
                </tr>
               </thead>
                @foreach ($vagas as $vaga)       
                <tbody>
                  <tr>
                    <td>{{$vaga->descricao}}</td>
                    <td>{{$vaga->tipo}}</td> 
                    <td>{{$vaga->salario}}</td>                              
                  </tr>  
                </tbody>             
                @endforeach                    
              @else
                <h1>No momento não há vagas aqui!</h1>                   
               @endif
         </table>

</body>
</html>

 