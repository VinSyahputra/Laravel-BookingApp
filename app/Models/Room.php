<?php

namespace App\Models;

use App\Models\Data;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Cviebrock\EloquentSluggable\Sluggable;
class Room extends Model
{
    use HasFactory, Sluggable;

    protected $guarded = ['id'];
    public function data(){
        return $this->hasMany(Data::class);
    }

    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'name'
            ]
        ];
    }
}
