<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Job extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'id',
        'position_name',
        'position_status',
        'employment_type',
        'qualifications',
        'post_date',
        'end_date',
        'branch_id',
        'department_id',
    ];

    /**
     * Get the department name that belongs to jobs
     */
    public function department(): BelongsTo
    {
        return $this->belongsTo(Department::class, 'department_id');
    }

    /**
     * Get branch that belongs to jobs
     */
    public function branch(): BelongsTo
    {
        return $this->belongsTo(Branch::class, 'branch_id');
    }

    /**
     * One job can be applied by many applicants
     */
    public function applicants(): HasMany
    {
        return $this->hasMany(Applicant::class);
    }
}
