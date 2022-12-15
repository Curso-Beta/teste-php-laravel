<?php

namespace App\Providers;

use App\Services\ApplicationService;
use App\Services\ApplicationServiceInterface;
use App\Services\CandidateService;
use App\Services\CandidateServiceInterface;
use App\Services\CompanyService;
use App\Services\CompanyServiceInterface;
use App\Services\OpportunityService;
use App\Services\OpportunityServiceInterface;
use Illuminate\Support\ServiceProvider;

class ServiceLayerServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(
            ApplicationServiceInterface::class,
            ApplicationService::class
        );
        $this->app->bind(
            CompanyServiceInterface::class,
            CompanyService::class
        );
        $this->app->bind(
            CandidateServiceInterface::class,
            CandidateService::class
        );
        $this->app->bind(
            OpportunityServiceInterface::class,
            OpportunityService::class
        );
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
