<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Applicant extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'id',
        'fullname',
        'email',
        'birth_date',
        'age',
        'birth_place',
        'address',
        'applicant_phones',
        'religion',
        'gender',
        'marital_status',
        'ktp_number',
        'hobby',
        'blood_type',
        'height',
        'weight',
        'application_status',
        'application_date',
        'info_of_job',
        'social_medias',
        'applicant_photo',
        'term_and_co',
        'job_id',
        'application_status_id',
    ];

    /**
     * Get related jobs the applicant applied 
     */
    public function job(): BelongsTo
    {
        return $this->belongsTo(Job::class, 'job_id');
    }

    /**
     * One applicant had many family members
     */
    public function applicantFamilies(): HasMany
    {
        return $this->hasMany(ApplicantFamily::class);
    }

    /**
     * One applicant can had more than one medical history
     */
    public function applicantMedicalHistories(): HasMany
    {
        return $this->hasMany(ApplicantMedicalHistory::class);
    }

    /**
     * One applicant can had more than one education history whether Formal and Informal 
     */
    public function applicantEducationHistories(): HasMany
    {
        return $this->hasMany(ApplicantEducationHistory::class);
    }

    /**
     * One applicant can had multiple skills
     */
    public function applicantSkills(): HasMany
    {
        return $this->hasMany(ApplicantSkill::class);
    }

    /**
     * One applicant can had multiple skills
     */
    public function applicantOccupationHistories(): HasMany
    {
        return $this->hasMany(ApplicantOccupationHistory::class);
    }

    /**
     * One applicant can had multiple skills
     */
    public function applicantReferences(): HasMany
    {
        return $this->hasMany(ApplicantReference::class);
    }

    /**
     * One applicant can had multiple skills
     */
    public function applicantAdditionalInfo(): HasOne
    {
        return $this->hasOne(ApplicantAdditionalInfo::class);
    }

    /**
     * One applicant can had multiple files
     */
    public function applicantDocuments(): HasOne
    {
        return $this->hasOne(ApplicantDocuments::class);
    }

    /**
     * One applicant can had multiple files
     */
    public function applicationStatus(): BelongsTo
    {
        return $this->belongsTo(ApplicationStatus::class, 'application_status_id');
    }
}
