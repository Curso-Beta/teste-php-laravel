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
     
    <div class="container text-center mt-5">
      
       
      
        <div class="row row-cols-6 row-cols-lg-2">
          <h1>Administrador</h1>
          <div class="container  p-5 m-5 text-center"> 
            <div class="card text-center  m-2 p-2" style="width: 32rem;">
            <form action="{{route('login.adm')}}" method="POST">
              @csrf
              <div class="mb-3 row">
                <label for="staticEmail" class="col-sm-2 col-form-label">Email</label>
                <div class="col-sm-10">
                  <input type="text" class="form-control" id="staticEmail"  name="usuario"  value="{{old('usuario')}}">
                  {{$errors->has('usuario') ? $errors->first('usuario') : '' }}
                </div>
              </div>
              <div class="mb-3 row">
                <label for="inputPassword" class="col-sm-2 col-form-label">Senha</label>
                <div class="col-sm-10">
                  <input type="password" class="form-control" id="inputPassword" name="senha"  value="{{old('senha')}}" >
                  {{$errors->has('senha') ? $errors->first('senha') : '' }}
                </div>
              </div>
              <button class="btn  btn-outline-success">Login</button>
            </form>
          </div>
            {{ isset($erro) && $erro != '' ? $erro : ''}}
          </div>
        </div>
      </div>

 
 </body>
 </html>