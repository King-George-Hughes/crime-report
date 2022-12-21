<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'first_name',
        'last_name',
        'other_name',
        'gender',
        'dob',
        'contact',
        'email',
        'password',
        'role'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

     // Search
     public function scopeFilter($query, array $filters){
        if($filters['search'] ?? false){
            $query->where('first_name','like','%' . request('search') . '%')
                ->orWhere('last_name','like','%' . request('search') . '%')
                ->orWhere('email','like','%' . request('search') . '%');
        }
    }

    // Relationship to News
    public function news(){
        return $this->belongsTo(News::class, 'user_id');
    }

    // Relationship to Crime
    public function crimes(){
        return $this->belongsTo(Crime::class, 'user_id');
    }
}