<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <title>Editar Usuário</title>
</head>
<body>
    <div class="container p-5 m-5">
        <h1>Editar Usuário</h1>
        <span><a class="btn btn-dark" href="{{route('home.adm')}}">Voltar</a></span> 
    </div>
   <div class="container">
 
    <form action="{{route('editarUsuariosId',['id'=>$id])}}" method="post">  
        <input type="hidden" name="id" value="{{$id->id}}">    
          @csrf
        <div class="row">
            <div class="col p-1 m-1">
              <label>Nome</label>    
              <input  type="text" class="form-control" placeholder="Nome" aria-label="nome" name="nome" value="{{$id->nome}}">
              <label>Email</label>    
              <input type="text" class="form-control" placeholder="E-mail" aria-label="email" name="email" value="{{$id->email}}">
            </div>
            <div class="col p-1 m-1">
                <label>Telefone</label> 
                <input type="text" class="form-control" placeholder="Telefone" aria-label="telefone" name="telefone"  value="{{$id->telefone}}">
                <label>Senha</label> 
                <input type="text" class="form-control" placeholder="senha" aria-label="telefone" value="{{$id->senha}}" name="senha">
              </div>
          </div>  
          <Button class="btn btn-outline-success" type="submit">Enviar</Button>     
    </form>
   </div>
</body>
</html>