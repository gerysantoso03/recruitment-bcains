<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Division extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'id',
        'division_name',
        'division_head',
    ];

    /**
     * Get all departments belongs to division
     */
    public function departments(): HasMany
    {
        return $this->hasMany(Department::class);
    }

    // overwriting the model boot method to extend it with a addition to the deleting event
    // public static function boot()
    // {
    //     parent::boot();
    //     static::deleting(function ($division) {
    //         $division->departments->delete();
    //     });
    // }
}