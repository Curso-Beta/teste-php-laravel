<?php

namespace App\Services;

use App\Models\Opportunity;

interface OpportunityServiceInterface
{   
    public function list(array $data);
    public function createOpportunity(array $data);
    public function findOpportunity(int $id);
    public function updateOpportunity(Opportunity $opportunity, array $data);
    public function deleteById(int $id);
    public function delete(Opportunity $opportunity);
}