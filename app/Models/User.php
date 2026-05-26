<?php

namespace App\Models;

use Database\Factories\UserFactory;
use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Attributes\Hidden;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

#[Fillable([
    'name',
    'email',
    'password',
    'role',
    'school_id',
    'status',
])]

#[Hidden([
    'password',
    'remember_token',
])]

class User extends Authenticatable
{
    /** @use HasFactory<UserFactory> */
    use HasFactory, Notifiable;

    /*
    |--------------------------------------------------------------------------
    | Attribute Casting
    |--------------------------------------------------------------------------
    */

    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    /*
    |--------------------------------------------------------------------------
    | Relationships
    |--------------------------------------------------------------------------
    */

    public function school()
    {
        return $this->belongsTo(School::class);
    }

    /*
    |--------------------------------------------------------------------------
    | Role Helpers
    |--------------------------------------------------------------------------
    */

    public function isStudent(): bool
    {
        return $this->role === 'student';
    }

    public function isInstructor(): bool
    {
        return $this->role === 'instructor';
    }

    public function isSchoolAdmin(): bool
    {
        return $this->role === 'school_admin';
    }

    public function isSuperAdmin(): bool
    {
        return $this->role === 'super_admin';
    }

    /*
    |--------------------------------------------------------------------------
    | Permission Helpers
    |--------------------------------------------------------------------------
    */

    public function canManageStudents(): bool
    {
        return $this->isSchoolAdmin() || $this->isInstructor();
    }

    /*
    |--------------------------------------------------------------------------
    | Status Helpers
    |--------------------------------------------------------------------------
    */

    public function isActive(): bool
    {
        return $this->status === 'active';
    }

    public function isInactive(): bool
    {
        return $this->status === 'inactive';
    }

    public function isCompleted(): bool
    {
        return $this->status === 'completed';
    }

    public function studentProfile()
    {
        return $this->hasOne(StudentProfile::class);
    }
}