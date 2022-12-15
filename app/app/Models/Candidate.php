<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Candidate extends Model
{
    use HasFactory;
    const LABELS = ['','ID', 'Nome', 'email', 'telefone', 'Nível', 'Area', 'Pretensão'];
    const VISIBLE = ['id', 'name', 'email', 'phone', 'level', 'area', 'expected_salary'];

    protected $fillable = ['id', 'name', 'email', 'phone', 'level', 'area', 'expected_salary'];

    public function opportunities(): BelongsToMany
    {
        return $this->belongsToMany(Opportunity::class, 'candidates_opportunities');
    }
}
