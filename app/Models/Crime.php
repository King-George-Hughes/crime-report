<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Crime extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'user_id',
        'description',
        'status',
        'ip',
        'region',
        'lat',
        'lng'
    ];


    // Relationship to User
    public function user(){
        return $this->belongsTo(Crime::class, 'user_id');
    }
}