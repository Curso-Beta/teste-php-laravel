@extends('vacancies.layout')

  

@section('content')

<div class="row">

    <div class="col-lg-12 margin-tb">

        <div class="pull-left">

            <h2>Add New Vacancy</h2>

        </div>

        <div class="pull-right">

            <a class="btn btn-primary" href="{{ route('vacancies.index') }}"> Back</a>

        </div>

    </div>

</div>

   

@if ($errors->any())

    <div class="alert alert-danger">

        <strong>Whoops!</strong> There were some problems with your input.<br><br>

        <ul>

            @foreach ($errors->all() as $error)

                <li>{{ $error }}</li>

            @endforeach

        </ul>

    </div>

@endif

   

<form action="{{ route('vacancies.store') }}" method="POST">

    @csrf

  

     <div class="row">

        <div class="col-xs-12 col-sm-12 col-md-12">

            <div class="form-group">

                <strong>Name:</strong>

                <input type="text" name="name" class="form-control" placeholder="Name">

            </div>

        </div>
        <p></p>

        <div class="col-xs-12 col-sm-12 col-md-12">

            <div class="form-group">

                <strong>Vacancy Type:</strong>

                <select name="type_vacancy">
                <option value="1"> CLT </option>
                <option value="2"> Pessoa Jurídica </option>
                <option value="3"> Freelancer </option>
                </select>
            </div>

        </div>

        <p></p>

        <div class="col-xs-12 col-sm-12 col-md-12">

        <strong>Status:</strong>
        <select name="status">
        <option value="1"> Ativa </option>
        <option value="2"> Inativa </option>
        </select>

        </div>

        <div class="col-xs-12 col-sm-12 col-md-12 text-center">

                <button type="submit" class="btn btn-primary">Submit</button>

        </div>

    </div>

   

</form>

@endsection