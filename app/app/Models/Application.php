<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Application extends Model
{
    use HasFactory;
    const LABELS = ['', 'ID', 'Candidato', 'Vaga'];
    const VISIBLE = ['id', 'candidate', 'opportunity'];

    protected $table="candidates_opportunities";
    protected $fillable = ['candidate_id', "opportunity_id"];

    public function candidate(){
        return $this->belongsTo(Candidate::class);
    }

    public function opportunity(){
        return $this->belongsTo(Opportunity::class);
    }
}
