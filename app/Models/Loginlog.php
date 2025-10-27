<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Loginlog extends Model
{
    protected $fillable = [
        'user_id',
        'loggedin',
    ];

    protected $casts = [
        'loggedin' => 'boolean',
    ];

    // Relationship
    public function user()
    {
        return $this->belongsTo(User::class);
    }}
