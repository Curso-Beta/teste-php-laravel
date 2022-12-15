<div class="container-fluid col-md-8 bg-white border border-light rounded p-2 shadow">
    <form method="POST" action="{{ $action }}">
        @csrf
        @isset($company)
        @method('PUT')
        @endisset
        <div class="col-md-8 pb-2">
            <label for="name" class="form-label">Empresa</label>
            <input type="text" class="form-control" id="name" name="name" placeholder="Nome da Empresa" value="@isset($company){{$company->name}}@endisset">
            @error('name')
            <div class="text-danger">
                {{$message}}
            </div>
            @enderror
        </div>
        <button type="submit" class="btn btn-primary active">Submit</button>
    </form>
</div>