<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Opportunity extends Model
{
    use HasFactory;
    const LABELS = ['','ID','Tipo de Contrato', 'Aceita Inscrições?', 'Faixa Salarial'];
    const VISIBLE = ['id','contract_type', 'accepts_applications', 'offered_salary'];

    protected $table = 'opportunities';
    protected $fillable = ['id','contract_type', 'accepts_applications', 'offered_salary'];

    public function Company(): BelongsTo
    {
        return $this->belongsTo(Company::class);
    }

    public function Candidates(): BelongsToMany
    {
        return $this->belongsToMany(Candidate::class, 'candidates_opportunities');
    }
}
