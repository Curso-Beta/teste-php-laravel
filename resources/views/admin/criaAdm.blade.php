<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <title>Cadastro de adm</title>
</head>
<body>
    <div class="container p-5 m-5">
        <h1>Cadastro de adm</h1>
    </div>
   <div class="container">
    <form action="" method="post">      
        @csrf
        <div class="row">
            <div class="col p-1 m-1">
              <input type="text" class="form-control" placeholder="E-mail" aria-label="email" name="email">
              <input type="text" class="form-control" placeholder="Senha" aria-label="senha" name="senha">
            </div>
          </div>  
          <Button class="btn btn-outline-success" type="submit">Enviar</Button>     
    </form>
   </div>
</body>
</html>