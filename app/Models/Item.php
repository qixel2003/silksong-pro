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
        'description'
    ];

//    protected $guarded = [];

    public function tags()
    {
        return $this->belongsToMany(Tag::class);
    }
//
//    public function users()
//    {
//        return $this->belongsTo(User::class);
//    }
//
//    public function comments()
//    {
//        return $this->hasMany(Comment::class); // Use singular model name
//    }
}
