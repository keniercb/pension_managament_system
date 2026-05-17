<?php

namespace App\Modules\IAM\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Database\Factories\UserFactory;
use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Attributes\Hidden;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

#[Fillable(['name', 'email', 'password', 'created_by', 'created_at'])]
#[Hidden(['password', 'remember_token'])]
class User extends Authenticatable
{
    /** @use HasFactory<UserFactory> */
    use HasFactory, Notifiable, HasApiTokens;

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    public function scopeFilter($query, $filter)
    {
        return $query->where('name', 'LIKE', "%{$filter}%")->orWhere('email', 'LIKE', "%{$filter}%");
    }

    public function scopeName($query, $name)
    {
        return $query->where('name', 'LIKE', "%{$name}%");
    }

    public function scopeEmail($query, $email)
    {
        return $query->where('email', 'LIKE', "%{$email}%");
    }

}
