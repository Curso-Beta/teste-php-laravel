<div class="container-fluid col-md-8 bg-white border border-light rounded p-2 shadow">
    <form method="POST" action="{{ $action }}">
        @csrf
        @isset($application)
        @method('PUT')
        @endisset
        <div class="col-md-8 pb-2">
            <div class="form-group pb-2">
                <label for="candidates" class="form-label">Candidato</label>
                <select id="candidates" class="form-control" name="candidate_id" onchange="updateOpportunities()">
                    @foreach ($candidates as $candidate)
                    <option value="{{$candidate->id}}" class="candidate-item">{{$candidate->name}}</option>
                    @endforeach
                </select>
                <label for="opportunities" class="form-label">Vaga</label>
                <select id="opportunities" class="form-control" name="opportunity_id">
                </select>
            </div>
        </div>
        <button type="submit" class="btn btn-primary active">Submit</button>
    </form>
</div>

@section('javascripts')
<script src="https://code.jquery.com/jquery-3.5.1.js" prefer></script>
<script>
    function updateOpportunities() {
        baseUrl = "{{Route('home')}}";
        id = $("#candidates").find(":selected").val();
        $.get(baseUrl + "/candidate/" + id + "/available", function(data) {
            $.each(data, function(index, value) {
                $("<option value=" + value.id + ">" + value.contract_type + " - R$" + value.offered_salary + ",00</option>").appendTo("#opportunities");
            });
        });
    }
</script>
@endsection