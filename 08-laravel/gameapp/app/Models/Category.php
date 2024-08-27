<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'image',
        'manufacturer',
        'releasedate',
        'description',
    ];

    //Relationship : Category has many games
    public function games() {
        return $this->hasMany('App\Models\Game');
    }

    public function scopeNames($categories, $query)
    {
        if (trim($query)) {
            $categories->where('name', 'LIKE' , "%$query%")
                ->orwhere('id', 'LIKE' , "%$query%");
        }
    }

}