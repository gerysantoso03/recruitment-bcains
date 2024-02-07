<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Applicant extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'fullname',
        'email',
        'phone_number',
        'address',
        'dob',
        'photo',
        'resume',
        'application_form',
        'linkedin',
        'portfolio_link',
        'cover_letter',
        'register_date',
    ];
}
