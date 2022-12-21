<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AnalysisReport extends Model
{
    use HasFactory;

    protected $fillable = [
        'crime_id',
        'arrest',
        'officer_in_charge',
        'court',
        'remand',
        'jailed',
        'remarks' 
    ];
}
