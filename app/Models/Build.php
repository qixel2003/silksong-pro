<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Build extends Model
{
    use HasFactory;

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


    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    // Many items can belong to a build
    public function items(): BelongsToMany
    {
        return $this->belongsToMany(Item::class, 'build_item', 'build_id', 'item_id');
    }
}
