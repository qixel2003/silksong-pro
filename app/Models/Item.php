<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    use HasFactory;
    protected $table = 'Items';

    protected $fillable = [
        'name',
        'description',
        'tag_id'
    ];

//    protected $guarded = [];

    public function tags()
    {
        return $this->belongsToMany(Tag::class);
    }

    public function builds()
    {
        return $this->belongsToMany(Build::class, 'build_item', 'item_id', 'build_id');
    }


    public function scopeFilter($query, array $filters)
    {
        // Search by name
        if (!empty($filters['search'])) {
            $query->where('name', 'like', '%' . $filters['search'] . '%');
        }

        // Filter by tag
        if (!empty($filters['tag'])) {
            $query->whereHas('tags', function ($q) use ($filters) {
                $q->where('tags.id', $filters['tag']);
            });
        }

        return $query;
    }
//
//    public function users()
//    {
//        return $this->belongsTo(User::class);
//    }
//
}
