<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class StudentProfile extends Model
{
    protected $fillable = [
        'user_id',
        'student_id',
        'address',
        'city',
        'province',
        'country',
        'postal_code',
        'citizenship',
        'other_address',
        'phone',
        'other_phone',
        'emergency_contact_name',
        'emergency_contact_phone',
        'licence_number',
        'date_of_birth',
        'medical_date',
        'medical_expiry',
        'medical_category',
        'cohort',
        'primary_instructor_id',
        'secondary_instructor_id',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function primaryInstructor()
    {
        return $this->belongsTo(User::class, 'primary_instructor_id');
    }

    public function secondaryInstructor()
    {
        return $this->belongsTo(User::class, 'secondary_instructor_id');
    }
}