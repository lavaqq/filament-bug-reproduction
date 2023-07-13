<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Contact extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = [
        'last_name',
        'first_name',
        'job_title',
        'email',
        'phone',
    ];

    /**
     * Get all companies in relation with the record.
     */
    public function companies(): BelongsToMany
    {
        return $this->belongsToMany(Company::class);
    }
}
