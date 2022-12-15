<?php

namespace App\Services;

use App\Models\Opportunity;
use Illuminate\Database\Eloquent\Builder;

class OpportunityService implements OpportunityServiceInterface
{

    public function __construct(Opportunity $opportunity){
        $this->opportunity = $opportunity;
    }
    
    public function list(array $data)
    {
        $candidates = Opportunity::query();
        $conditions = [
            'contract_type' => 'like',
            'accepts_applications' => '=',
            'offered_salary' => '>',
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

    public function createOpportunity(array $data){
        $opportunity = new Opportunity($data);
        $opportunity->save();
        return $opportunity;
    }

    public function findOpportunity(int $id){
        return Opportunity::find($id);
    }

    public function updateOpportunity(Opportunity $opportunity, array $data){
        $opportunity->update($data);
        return $opportunity;
    }

    public function deleteById(int $id){
        Opportunity::destroy($id);
    }

    public function delete(Opportunity $opportunity){
        $opportunity->delete();
    }
}