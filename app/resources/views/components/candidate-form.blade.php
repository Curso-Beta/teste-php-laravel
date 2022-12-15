<div class="container-fluid col-md-8 bg-white border border-light rounded p-2 shadow">
    <form method="POST" action="{{ $action }}">
        @csrf
        @isset($candidate)
        @method('PUT')
        @endisset
        <div class="form-group pb-2">
            <label for="name" class="form-label">Nome</label>
            <input type="text" class="form-control" id="name" name="name" placeholder="Nome" value="@isset($candidate){{$candidate->name}}@endisset">
            @error('name')
            <div class="text-danger">
                {{$message}}
            </div>
            @enderror
        </div>

        <div class="form-group pb-2">
            <label for="email" class="form-label">Email</label>
            <input type="email" class="form-control" id="email" name="email" placeholder="Email" value="@isset($candidate){{$candidate->email}}@endisset">
            @error('email')
            <div class="text-danger">
                {{$message}}
            </div>
            @enderror
        </div>

        <div class="form-group pb-2">
            <label for="phone" class="form-label">Telefone</label>
            <input type="text" class="form-control" id="phone" name="phone" placeholder="Telefone" value="@isset($candidate){{$candidate->phone}}@endisset">
            @error('phone')
            <div class="text-danger">
                {{$message}}
            </div>
            @enderror
        </div>

        <div class="form-group pb-2">
            <label for="area" class="form-label">Área Profissional</label>
            <input type="text" class="form-control" id="area" name="area" placeholder="Ex: Tecnologia, Economia, Marketing, etc..." value="@isset($candidate){{$candidate->area}}@endisset">
            @error('area')
            <div class="text-danger">
                {{$message}}
            </div>
            @enderror
        </div>

        @isset($candidate)
        <div class="form-group pb-2">
            <label for="level" class="form-label">Nível de Formação</label>
            <select class="form-control" id="level" name="level">
                <option value="medio" @if ($candidate->level == 'medio') selected @endif>Ensino Médio</option>
                <option value="tecnico" @if ($candidate->level == 'tecnico') selected @endif>Ensino Técnico</option>
                <option value="superior" @if ($candidate->level == 'superior') selected @endif>Ensino Superior</option>
            </select>
            @error('level')
            <div class="text-danger">
                {{$message}}
            </div>
            @enderror
        </div>
        @endisset

        @empty($candidate)
        <div class="form-group pb-2">
            <label for="level" class="form-label">Nível de Formação</label>
            <select class="form-control" id="level" name="level">
                <option value="medio">Ensino Médio</option>
                <option value="tecnico">Ensino Técnico</option>
                <option value="superior">Ensino Superior</option>
            </select>
            @error('level')
            <div class="text-danger">
                {{$message}}
            </div>
            @enderror
        </div>
        @endempty

        <div class="form-group pb-2">
            <label for="expected_salary" class="form-label">Pretensão Salarial</label>
            <input type="text" class="form-control" id="expected_salary" name="expected_salary" placeholder="Pretensao Salarial" value="@isset($candidate){{$candidate->expected_salary}}@endisset">
            @error('expected_salary')
            <div class="text-danger">
                {{$message}}
            </div>
            @enderror
        </div>
        <button type="submit" class="btn btn-primary active">
            Submit
        </button>
    </form>
</div>