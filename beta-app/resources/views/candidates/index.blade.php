@extends('candidates.layout')

 

@section('content')

    <div class="row">

        <div class="col-lg-12 margin-tb">

            <div class="pull-left">

                <h2>BETA CURSOS - RAMON MENDES</h2>

            </div>

            <div class="pull-right">

                <a class="btn btn-success" href="{{ route('candidates.create') }}"> Create New Candidate</a>

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

            <th>Name</th>

            <th width="280px">Action</th>

        </tr>

        @foreach ($candidates as $candidate)

        <tr>

            <td>{{ ++$i }}</td>

            <td>{{ $candidate->name }}</td>

            <td>

                <form action="{{ route('candidates.destroy',$candidate->id) }}" method="POST">

   

                    <a class="btn btn-info" href="{{ route('candidates.show',$candidate->id) }}">Show</a>

    

                    <a class="btn btn-primary" href="{{ route('candidates.edit',$candidate->id) }}">Edit</a>

   

                    @csrf

                    @method('DELETE')

      

                    <button type="submit" class="btn btn-danger">Delete</button>

                </form>

            </td>

        </tr>

        @endforeach

    </table>

  

    {!! $candidates->links() !!}

      

@endsection