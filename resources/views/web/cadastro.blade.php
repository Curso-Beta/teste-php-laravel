<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <title>Cadastro</title>
</head>
<body>
    

   
    <div class="container col-4">
        <div class="container p-5 m-5">
            <h1>Cadastre-se</h1>
        </div>
        <form>
            <div class="mb-3">
              <label for="Nome" class="form-label">Nome</label>
              <input  type="text" class="form-control" placeholder="Nome" aria-label="nome" name="nome">
              <label for="Email" class="form-label">Email</label>
              <input type="text" class="form-control" placeholder="E-mail" aria-label="email" name="email" required>
            </div>
            <div class="mb-3">
              <label for="Telefone" class="form-label">Telefone</label>
              <input type="text" class="form-control" placeholder="Telefone" aria-label="telefone" name="telefone">
              <label for="Senha" class="form-label">Senha</label>
                <input type="text" class="form-control" placeholder="Senha" aria-label="senha" name="senha">
            </div>
            <button type="submit" class="btn btn-primary">Enviar</button>
          </form>
    </div>
</body>
</html>