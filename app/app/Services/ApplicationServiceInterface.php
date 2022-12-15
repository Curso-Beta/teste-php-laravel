<?php

namespace App\Services;

use App\Models\Application;
use App\Models\Candidate;

interface ApplicationServiceInterface
{   
    public function list(array $data);
    public function createApplication(array $data);
    public function findApplication(int $id);
    public function updateApplication(Application $application, array $data);
    public function deleteById(int $id);
    public function delete(Application $application);
    public function getCandidates();
    public function getAvailableOpportunities(Candidate $candidate);
}