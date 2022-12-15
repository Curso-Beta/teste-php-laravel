<?php

namespace App\Services;

use App\Models\Company;

interface CompanyServiceInterface
{   
    public function list(array $data);
    public function createCompany(array $data);
    public function findCompany(int $id);
    public function updateCompany(Company $company, array $data);
    public function deleteById(int $id);
    public function delete(Company $company);
}