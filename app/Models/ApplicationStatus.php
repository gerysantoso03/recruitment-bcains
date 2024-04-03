<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class ApplicationStatus extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'id',
        'status',
        'status_code',
    ];

    /**
     * Medical history belongs to applicant
     */
    public function applicant(): HasMany
    {
        return $this->hasMany(Applicant::class);
    }
}
