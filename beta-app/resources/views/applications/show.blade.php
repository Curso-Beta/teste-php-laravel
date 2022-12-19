@extends('applications.layout')

  

@section('content')

    <div class="row">

        <div class="col-lg-12 margin-tb">

            <div class="pull-left">

                <h2> Show Application</h2>

            </div>

            <div class="pull-right">

                <a class="btn btn-primary" href="{{ route('applications.index') }}"> Back</a>

            </div>

        </div>

    </div>

   

    <div class="row">

        <div class="col-xs-12 col-sm-12 col-md-12">

            <div class="form-group">

                <strong>User:</strong>

                {{ $application->user }}

            </div>

        </div>

        <div class="col-xs-12 col-sm-12 col-md-12">

            <div class="form-group">

                <strong>Vacancy:</strong>

                {{ $application->vacancy }}

            </div>

        </div>

    </div>

@endsection