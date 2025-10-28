<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Build extends Model
{
    protected $fillable = [
        'title',
        'content',
        'item_list',
        'status'
    ];

    protected $casts = [
        'item_list' => 'array',
        'status' => 'boolean',
    ];

    public function items()
    {
        return $this->belongsToMany(Item::class, 'build_item', 'build_id', 'item_id');
    }

    public function users()
    {
        return $this->belongsToMany(User::class, 'build_user', 'build_id', 'user_id');
    }
}
