<?php

namespace App\Services;

use App\Models\Candidate;
use Illuminate\Database\Eloquent\Builder;

class CandidateService implements CandidateServiceInterface
{

    public function __construct(Candidate $candidate)
    {
        $this->candidate = $candidate;
    }

    public function list(array $data)
    {
        $candidates = Candidate::query();
        $conditions = [
            'name' => 'like',
            'email' => 'like',
            'phone' => 'like',
            'area' => 'like',
            'level' => '=',
            'expected_salary' => '>'
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

    public function createCandidate(array $data)
    {
        $candidate = new Candidate($data);
        $candidate->save();
        return $candidate;
    }

    public function findCandidate(int $id)
    {
        return Candidate::find($id);
    }

    public function updateCandidate(Candidate $candidate, array $data)
    {
        $candidate->update($data);
        return $candidate;
    }

    public function deleteById(int $id)
    {
        Candidate::destroy($id);
    }

    public function delete(Candidate $candidate)
    {
        $candidate->delete();
    }

    public function all(){
        return Candidate::select('id', 'name')->get();
    }
}
