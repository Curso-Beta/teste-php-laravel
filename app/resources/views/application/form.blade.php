<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="container-fluid py-12">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Inscrições</h5>
                <x-application-form :action="$action" :candidates="$candidates ?? null"/>
            </div>
        </div>
    </div>
</x-app-layout>