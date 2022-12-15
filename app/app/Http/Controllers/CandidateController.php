<?php

namespace App\Http\Controllers;

use App\Http\Requests\Create\CreateCandidateRequest;
use App\Http\Requests\Update\UpdateCandidateRequest;
use App\Models\Candidate;
use App\Services\CandidateServiceInterface;

class CandidateController extends Controller
{
    public function __construct(CandidateServiceInterface $service)
    {
        $this->service = $service;
    }
    
    public function index()
    {
        $modelName = 'Candidate';
        $action = Route('candidates.index');
        return view('company.index', compact('modelName', 'action'));
    }

    public function dataTables()
    {
        return $this->service->datatables();
    }

    public function create()
    {
        $action = Route('candidate.store');
        return view('candidate.form', compact('action'));
    }

    public function store(CreateCandidateRequest $request)
    {
        $this->service->createCandidate($request->all());
        return redirect()->route('candidate.index')->with('success', 'Candidato cadastrada com sucesso');
    }

    public function edit(Candidate $candidate)
    {
        $action = Route('candidate.update', $candidate);
        return view('candidate.form', compact('action', 'candidate'));
    }

    public function update(UpdateCandidateRequest $request, Candidate $candidate)
    {
        $this->service->updateCandidate($candidate, $request->all());
        return redirect()->route('candidate.index')->with('sucess', 'Cadastro do candidato atualizado com sucesso');
    }

    public function destroy(Candidate $candidate)
    {
        $this->service->delete($candidate);
        return redirect()->route('candidate.index')->with('success', 'Os dados do candidato foram exclu�dos com sucesso.');
    }

}
