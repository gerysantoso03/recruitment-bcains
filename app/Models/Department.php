<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Department extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>  
     */
    protected $fillable = [
        'id',
        'department_name',
        'department_head',
        'division_id'
    ];

    /**
     * Get related division of the departments
     */
    public function division(): BelongsTo
    {
        return $this->belongsTo(Division::class, 'division_id');
    }

    /**
     * Get all jobs belong to department
     */
    public function jobs(): HasMany
    {
        return $this->hasMany(Job::class);
    }
}
