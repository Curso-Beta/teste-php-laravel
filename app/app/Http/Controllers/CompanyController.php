<?php

namespace App\Http\Controllers;

use App\Http\Requests\Create\CreateCompanyRequest;
use App\Http\Requests\Update\UpdateCompanyRequest;
use App\Services\CompanyService;

class CompanyController extends Controller
{
    public function __construct(CompanyService $service)
    {
        $this->service = $service;
    }

    public function index()
    {
        $modelName = 'Company';
        $action = Route('companies.index');
        return view('company.index', compact('modelName', 'action'));
    }

    public function create()
    {
        $action = Route('company.store');
        return view('company.form', compact('action'));
    }

    public function store(CreateCompanyRequest $request)
    {
        $data = $request->validated();
        $this->service->createCompany($data);
        return redirect()->route('company.index')->with('success', 'Empresa cadastrada com sucesso');
    }

    public function edit($id)
    {
        $company = $this->service->findCompany($id);
        $action = Route('company.update', $company);
        return view('company.form', compact('action', 'company'));
    }

    public function update(UpdateCompanyRequest $request, $id)
    {
        $company = $this->service->findCompany($id);
        $this->service->updateCompany($company, $request->all());
        return redirect()->route('company.index')->with('sucess', 'Cadastro da empresa atualizado com sucesso');
    }

    public function destroy($id)
    {
        $this->service->deleteById($id);
        return redirect()->route('company.index')->with('success', 'Os dados da empresa foram exclu�dos com sucesso.');
    }
}
