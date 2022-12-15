<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="row">
        <div class="col-sm-4">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Área do Candidato</h5>
                    <p class="card-text">Acesse abaixo a lista de candidatos</p>
                    <a href="{{ Route('candidate.index') }}" class="btn btn-primary">Candidatos</a>
                </div>
            </div>
        </div>
        <div class="col-sm-4">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Vagas</h5>
                    <p class="card-text">Acesse abaixo a lista de vagas</p>
                    <a href="{{ Route('opportunity.index') }}" class="btn btn-primary">Vagas</a>
                </div>
            </div>
        </div>
        <div class="col-sm-4">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Inscrições</h5>
                    <p class="card-text">Acesse abaixo a lista de inscrições</p>
                    <a href="{{ Route('application.index') }}" class="btn btn-primary">Inscrições</a>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>