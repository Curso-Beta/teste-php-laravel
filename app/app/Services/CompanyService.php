<?php

namespace App\Services;

use App\Models\Company;
use Illuminate\Database\Eloquent\Builder;
use Yajra\DataTables\Facades\DataTables;

class CompanyService implements CompanyServiceInterface
{

    public function __construct(Company $company){
        $this->company = $company;
    }
    
    public function list(array $data)
    {
        $candidates = Company::query();
        $conditions = [
            'name' => 'like',
        ];
        if(isset($data["mail"])){
            $data["email"] = $data["mail"];
        }
        $candidates = $this->addFilters($candidates, $data, $conditions);
        $candidates->orderBy($data['orderBy'] ?? "id", $data['sortedBy'] ?? "asc");
        return $candidates->paginate($data["limit"] ?? 20);
    }

    private function addFilters(Builder $query, array $data, array $conditions)
    {
        unset($data["limit"], $data["orderBy"], $data["sortedBy"], $data['mail'], $data['page']);
        foreach ($data as $column => $value) {
            $conditions[$column] == 'like'
                ? $this->addLikeFilter($query, $column, $value)
                : $query->where($column, $conditions[$column], $value);
        }
        return $query;
    }

    private function addLikeFilter(Builder $query, string $column, string $value)
    {
        return $query->where($column, 'like', "%$value%");
    }

    public function createCompany(array $data){
        $company = new Company($data);
        $company->save();
        return $company;
    }

    public function findCompany(int $id){
        return Company::find($id);
    }

    public function updateCompany(Company $company, array $data){
        $company->update($data);
        return $company;
    }

    public function deleteById(int $id){
        Company::destroy($id);
    }

    public function delete(Company $company){
        $company->delete();
    }

    public function datatables(){

        $model = Company::query();

        return DataTables::eloquent($model)
        ->addColumn('Editar', function(Company $company) {
            return "teste";
        })
        ->rawColumns(['Editar'])
        ->toJson();
        
        //$query = Company::all();
        //return datatables($query)->make(true);
    }
}