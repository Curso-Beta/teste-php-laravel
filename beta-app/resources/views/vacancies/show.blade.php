@extends('vacancies.layout')

  

@section('content')

    <div class="row">

        <div class="col-lg-12 margin-tb">

            <div class="pull-left">

                <h2> Show Vacancy</h2>

            </div>

            <div class="pull-right">

                <a class="btn btn-primary" href="{{ route('vacancies.index') }}"> Back</a>

            </div>

        </div>

    </div>

   

    <div class="row">

        <div class="col-xs-12 col-sm-12 col-md-12">

            <div class="form-group">

                <strong>Name:</strong>

                {{ $vacancy->name }}

            </div>

        </div>

        <div class="col-xs-12 col-sm-12 col-md-12">

            <div class="form-group">

                <strong>Vacancy Type:</strong>

                @if($vacancy->type_vacancy == 1) {
                <td>CLT</td>
                } 
                @endif
                
                @if($vacancy->type_vacancy == 2) {
                    <td>Pessoa Jurídica</td>
                }
                @endif 
                
                @if($vacancy->type_vacancy == 3) {
                    <td>Freelancer</td>
                }
                @endif 

            </div>

        </div>

        <div class="col-xs-12 col-sm-12 col-md-12">

            <div class="form-group">

                <strong>Status:</strong>

                @if($vacancy->status == 1) {
                <td>Ativo</td>
                }
                @endif 

                @if($vacancy->status == 2) {
                    <td>Inativo</td>
                }
                @endif 

            </div>

        </div>

    </div>

@endsection