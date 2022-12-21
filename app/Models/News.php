<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class News extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'image',
        'title',
        'description'
    ];

    // Search
    public function scopeFilter($query, array $filters){
        if($filters['search'] ?? false){
            $query->where('title','like','%' . request('search') . '%')
                ->orWhere('description','like','%' . request('search') . '%');
        }
    }

    // Relationship to User
    public function user(){
        return $this->belongsTo(User::class, 'user_id');
    }
}