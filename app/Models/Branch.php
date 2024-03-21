<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Branch extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'id',
        'branch_name',
        'branch_location',
        'branch_head',
    ];

    /**
     * Get all departments belongs to division
     */
    public function jobs(): HasMany
    {
        return $this->hasMany(Job::class);
    }
}
