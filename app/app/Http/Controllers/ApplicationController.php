<?php

namespace App\Http\Controllers;

use App\Http\Requests\Create\CreateApplicationRequest;
use App\Models\Application;
use App\Models\Candidate;
use App\Services\ApplicationService;
use App\Services\ApplicationServiceInterface;
use Illuminate\Http\Request;

class ApplicationController extends Controller
{
    public function __construct(ApplicationServiceInterface $service)
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
        $modelName = 'Application';
        $action = Route('applications.index');
        return view('company.index', compact('modelName', 'action'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $action = Route('application.store');
        $candidates = $this->service->getCandidates();
        return view('application.form', compact('action','candidates'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateApplicationRequest $request)
    {
        $data = $request->validated();
        $this->service->createApplication($data);
        return redirect(Route('application.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Application  $application
     * @return \Illuminate\Http\Response
     */
    public function show(Application $application)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Application  $application
     * @return \Illuminate\Http\Response
     */
    public function edit(Application $application)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Application  $application
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Application $application)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Application  $application
     * @return \Illuminate\Http\Response
     */
    public function destroy(Application $application)
    {
        //
    }

    public function availableOpportunities(Candidate $candidate)
    {
        return response()->json($this->service->getAvailableOpportunities($candidate));
    }
}
