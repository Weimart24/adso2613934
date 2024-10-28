<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class Game extends Model
{    use HasApiTokens, HasFactory, Notifiable;
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'title',
        'image',
        'developer',
        'releasedate',
        'categoryId',
        'userId',
        'price',
        'genre',
        'slider',
        'description',
    ];

    // Relationship : Game belongs to user
    public function user() {
        return $this->belongsTo('App\Models\User');
    }

    // Relationship : Game belongs to category
    public function category() {
        return $this->belongsTo('App\Models\Category');
    }

    // Relationship : Game belongs to collection
    public function collection() {
        return $this->belongsTo('App\Models\Collection');
    }

    public function scopeNames($games, $q)
    {
        if (trim($q)) {
            $games->where('title', 'LIKE', "%$q%");
        }
    }
}