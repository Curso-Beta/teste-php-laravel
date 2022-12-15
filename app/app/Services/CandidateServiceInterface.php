<?php

namespace App\Services;

use App\Models\Candidate;

interface CandidateServiceInterface
{
    public function list(array $data);
    public function createCandidate(array $data);
    public function findCandidate(int $id);
    public function updateCandidate(Candidate $candidate, array $data);
    public function deleteById(int $id);
    public function delete(Candidate $candidate);
    public function all();
}
