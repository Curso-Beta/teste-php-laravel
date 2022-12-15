<?php

namespace App\Services;

use App\Models\Application;
use App\Models\Candidate;
use App\Models\Opportunity;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\DB;

class ApplicationService implements ApplicationServiceInterface
{

    public function __construct(Application $application, CandidateServiceInterface $candidateService){
        $this->application = $application;
        $this->candidateService = $candidateService;
    }
    
    public function list(array $data)
    {
        $applications = Application::query();
        $conditions = [
            'candidate' => 'like',
            'opportunity' => 'like'
        ];
        $childColumns = [
            'candidate' => 'name',
            'opportunity' => 'contract_type',
        ];
        if(isset($data["mail"])){
            $data["email"] = $data["mail"];
        }
        $applications = $this->addChildFilters($applications, $data, $conditions, $childColumns);
        $applications->orderBy($data['orderBy'] ?? "id", $data['sortedBy'] ?? "asc");
        return $applications->paginate($data["limit"] ?? 20);
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

    private function addChildFilters(Builder $query, array $data, array $conditions, array $childColumns)
    {
        unset($data["limit"], $data["orderBy"], $data["sortedBy"], $data['mail'], $data['page']);
        foreach ($data as $column => $value) {
            $conditions[$column] === 'like'
            ? $query->whereRelation($column, $childColumns[$column], $conditions[$column], "%$value%")
            : $query->whereRelation($column, $childColumns[$column], $conditions[$column], $value);
        };
        return $query;
    }

    public function createApplication(array $data){
        $application = new Application($data);
        $application->save();
        return $application;
    }

    public function findApplication(int $id){
        return Application::find($id);
    }

    public function updateApplication(Application $application, array $data){
        $application->update($data);
        return $application;
    }

    public function deleteById(int $id){
        Application::destroy($id);
    }

    public function delete(Application $application){
        $application->delete();
    }

    public function getCandidates()
    {
        return $this->candidateService->all();
    }

    public function getAvailableOpportunities(Candidate $candidate){
        $applicateds = DB::table('opportunities')->join('candidates_opportunities', 'opportunities.id', '=', 'candidates_opportunities.opportunity_id')->where('candidates_opportunities.candidate_id', $candidate->id)->select('opportunities.id')->get()->toArray();
        $ids = [];
        foreach($applicateds as $applicated){
            $ids[] = $applicated->id;
        }
        return Opportunity::whereNotIn('id', $ids)->get();
    }
}