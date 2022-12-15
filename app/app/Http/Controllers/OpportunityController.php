<?php

namespace App\Http\Controllers;

use App\Http\Requests\Create\CreateOpportunityRequest;
use App\Http\Requests\Update\UpdateOpportunityRequest;
use App\Models\Opportunity;
use App\Services\OpportunityService;
use App\Services\OpportunityServiceInterface;
use Illuminate\Http\Request;

class OpportunityController extends Controller
{
    public function __construct(OpportunityServiceInterface $service)
    {
        $this->service = $service;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $modelName = 'Opportunity';
        $action = Route('opportunities.index');
        return view('company.index', compact('modelName', 'action'));
    }

    public function dataTables()
    {
        return $this->service->datatables();
    }

    public function create()
    {
        $action = Route('opportunity.store');
        return view('opportunity.form', compact('action'));
    }

    public function store(CreateOpportunityRequest $request)
    {
        $this->service->createOpportunity($request->all());
        return redirect()->route('opportunity.index')->with('success', 'Vaga cadastrada com sucesso');
    }

    public function edit(Opportunity $opportunity)
    {
        $action = Route('opportunity.update', $opportunity);
        return view('opportunity.form', compact('action', 'opportunity'));
    }

    public function update(UpdateOpportunityRequest $request, Opportunity $opportunity)
    {
        $this->service->updateOpportunity($opportunity, $request->all());
        return redirect()->route('opportunity.index')->with('sucess', 'Cadastro da vaga atualizado com sucesso');
    }

    public function destroy(Opportunity $opportunity)
    {
        $this->service->delete($opportunity);
        return redirect()->route('opportunity.index')->with('sucess', 'Cadastro da vaga excluido com sucesso');
    }
}
