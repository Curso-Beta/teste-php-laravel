@extends('vacancies.layout')

 

@section('content')

    <div class="row">

        <div class="col-lg-12 margin-tb">

            <div class="pull-left">

                <h2>BETA CURSOS INDEX VACANCY - RAMON MENDES DEVELOPER</h2>

            </div>

            <div class="pull-right">

                <a class="btn btn-success" href="{{ route('vacancies.create') }}"> Create New Vacancy</a>

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

            <th>Vacancy Type</th>

            <th>Status</th>

            <th width="280px">Action</th>

        </tr>

        @foreach ($vacancies as $vacancy)

        <tr>

            <td>{{ ++$i }}</td>

            <td>{{ $vacancy->name }}</td>

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

            @if($vacancy->status == 1) {
                <td>Ativo</td>
            }
            @endif 

            @if($vacancy->status == 2) {
                <td>Inativo</td>
            }
            @endif 

            <td>

                <form action="{{ route('vacancies.destroy',$vacancy->id) }}" method="POST">

   

                    <a class="btn btn-info" href="{{ route('vacancies.show',$vacancy->id) }}">Show</a>

    

                    <a class="btn btn-primary" href="{{ route('vacancies.edit',$vacancy->id) }}">Edit</a>

   

                    @csrf

                    @method('DELETE')

      

                    <button type="submit" class="btn btn-danger">Delete</button>

                </form>

            </td>

        </tr>

        @endforeach

    </table>

  

    {!! $vacancies->links() !!}

      

@endsection