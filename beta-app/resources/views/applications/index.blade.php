@extends('applications.layout')

 

@section('content')

    <div class="row">

        <div class="col-lg-12 margin-tb">

            <div class="pull-left">

                <h2></h2>

            </div>

            <div class="pull-right">

                <a class="btn btn-success" href="{{ route('applications.create') }}"> Create New Application</a>

            </div>

        </div>

    </div>

   

    @if ($message = Session::get('success'))

        <div class="alert alert-success">

            <p>{{ $message }}</p>

        </div>

    @endif

   

    <table class="table table-bordered">

        <tr>

            <th>No</th>

            <th>User</th>

            <th>Vacancy</th>

            <th width="280px">Action</th>

        </tr>

        @foreach ($applications as $application)

        <tr>

            <td>{{ ++$i }}</td>

            <td>{{ $application->user }}</td>

            <td>{{ $application->vacancy }}</td>

            <td>

                <form action="{{ route('applications.destroy',$application->id) }}" method="POST">

   

                    <a class="btn btn-info" href="{{ route('applications.show',$application->id) }}">Show</a>

    

                    <a class="btn btn-primary" href="{{ route('applications.edit',$application->id) }}">Edit</a>

   

                    @csrf

                    @method('DELETE')

      

                    <button type="submit" class="btn btn-danger">Delete</button>

                </form>

            </td>

        </tr>

        @endforeach

    </table>

  

    {!! $applications->links() !!}

      

@endsection