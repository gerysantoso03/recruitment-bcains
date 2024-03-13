<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class ApplicantOccupationHistory extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'id',
        'company_name',
        'company_address',
        'company_phone',
        'latest_position',
        'salary',
        'direct_spv',
        'start_year',
        'end_year',
        'reason_of_leaving',
        'latest_jobdesc',
        'organization_structure',
        'applicant_id',
    ];

    /**
     * Medical history belongs to applicant
     */
    public function applicant(): BelongsTo
    {
        return $this->belongsTo(Applicant::class, 'applicant_id');
    }
}
