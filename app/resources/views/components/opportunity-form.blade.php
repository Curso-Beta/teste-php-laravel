<div class="container-fluid col-md-8 bg-white border border-light rounded p-2 shadow">
    <form method="POST" action="{{ $action }}">
        @csrf
        @isset($opportunity)
            @method('PUT')
        @endisset
        @empty($opportunity)
        <div class="form-group pb-2">
            <label for="contract_type" class="form-label">Tipo de Contrato</label>
            <select class="form-control"
            id="contract_type" name="contract_type">
                <option value="clt">CLT</option>
                <option value="pj">Pessoa Jurídica</option>
                <option value="freelancer">Freelancer</option>
            </select>
            @error('contract_type')
            <div class="text-danger">
                {{$message}}
            </div>
            @enderror
        </div>
        @endempty

        @isset($opportunity)
        <div class="form-group pb-2">
            <label for="contract_type" class="form-label">Tipo de Contrato</label>
            <select class="form-control"
            id="contract_type" name="contract_type">
                <option value="clt" @if ($opportunity->contract_type == 'clt') selected @endif >CLT</option>
                <option value="pj" @if ($opportunity->contract_type == 'pj') selected @endif >Pessoa Jurídica</option>
                <option value="freelancer" @if ($opportunity->contract_type == 'freelancer') selected @endif >Freelancer</option>
            </select>
            @error('contract_type')
            <div class="text-danger">
                {{$message}}
            </div>
            @enderror
        </div>
        @endisset

        <div class="form-group pb-2">
            <label for="offered_salary" class="form-label">Faixa Salarial</label>
            <input type="text" class="form-control"
            id="offered_salary" name="offered_salary" placeholder="Salario Oferecido"
            value="@isset($opportunity){{$opportunity->offered_salary}}@endisset">
            @error('offered_salary')
            <div class="text-danger">
                {{$message}}
            </div>
            @enderror
        </div>

        @isset($opportunity)
        <div class="form-group form-check pb-2">
            <input type="checkbox" class="form-check-input" value="0" id="accepts_applications" name="accepts_applications" @if (!$opportunity->accepts_applications) checked @endif>
            <label class="form-check-label" for="accepts_applications">Pausar Vaga</label>
            @error('accepts_applications')
            <div class="text-danger">
                {{$message}}
            </div>
            @enderror
        </div>
        @endisset

        @empty($opportunity)
        <div class="form-group form-check pb-2">
            <input type="checkbox" class="form-check-input" value="0" id="accepts_applications" name="accepts_applications">
            <label class="form-check-label" for="accepts_applications">Pausar Vaga</label>
            @error('accepts_applications')
            <div class="text-danger">
                {{$message}}
            </div>
            @enderror
        </div>
        @endempty

        <button type="submit" class="btn btn-primary active">
        Submit
        </button>
    </form>
</div>