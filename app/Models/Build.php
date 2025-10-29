<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Build extends Model
{
    protected $fillable = [
        'title',
        'content',
        'item_list',
        'status',
        'user_id',
    ];

    protected $casts = [
        'item_list' => 'array',
        'status' => 'boolean',
    ];

    // Each build belongs to one user
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // Many items can belong to a build
    public function items()
    {
        return $this->belongsToMany(Item::class, 'build_item', 'build_id', 'item_id');
    }
}
