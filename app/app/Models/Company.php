<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    use HasFactory;
    const LABELS = ['', 'ID', 'Nome'];
    const VISIBLE = ['id', 'name'];

    protected $table = 'companies';
    protected $fillable = ['id', 'name'];
}
