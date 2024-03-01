<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class ApplicantFamily extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'id',
        'family_name',
        'gender',
        'age',
        'last_education',
        'occupation',
        'employeer_name',
        'applicant_id',
    ];

    /**
     * Many families belong to one applicant
     */
    public function applicant(): BelongsTo
    {
        return $this->belongsTo(Applicant::class(), 'applicant_id');
    }
}
