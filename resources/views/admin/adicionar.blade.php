<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <meta http-equiv="X-UA-Compatible" content="ie=edge">
   <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
   <title>Document</title>
</head>
<body>

   
<div class="container mt-5 p-5">
   <form action="{{ route('adicionar.vaga')}}" method="POST">
      <input type="hidden" name="id" value="{{$vaga->id ?? ''}}">
      @csrf
 
      <div class="mb-3">
         <label for="exampleInputEmail1" class="form-label">Descrição da Vaga <span><a class="btn btn-dark" href="{{route('listarVagas.adm')}}">Voltar</a> </span></label>
         <textarea type="text" class="form-control" id="descricao" aria-describedby="emailHelp" name="descricao"  required></textarea>           
       </div>
   
       <div class="mb-3">
        <label for="salario" class="form-label">Salario</label>
        <input type="number" class="form-control" id="salario" aria-describedby="salario" name="salario" />           
      </div>
    
   
      <div class="input-group mb-3">
         <label class="input-group-text" for="inputGroupSelect01">Tipo de contratação</label>
         <select class="form-select" id="inputGroupSelect01" name="tipo">
           <option selected>Selecione...</option>
           <option  value="CLT"   name="CLT" >CLT</option>
           <option  value="Pessoa Jurídica"  name="Freelancer" >Pessoa Jurídica</option>
           <option  value="Freelancer"  name="Freelancer">Freelancer.</option>
         </select>
       </div>

      <div class="input-group mb-3">
         <label class="input-group-text" for="inputGroupSelect01">Status</label>
         <select class="form-select" id="inputGroupSelect01" name="status">
           <option selected>Selecione...</option>
           <option    name="Ativo" >Ativo</option>
           <option    name="Pausar Vaga" >Pause</option>            
         </select>
       </div>

   
      <button type="submit" class="btn btn-outline-success">Cadastrar</button>   
    </form>  
</div>
</body>
</html>


