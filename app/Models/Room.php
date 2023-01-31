<?php

namespace App\Models;

use App\Models\Data;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Room extends Model
{
    use HasFactory;

    protected $guarded = ['id'];
    public function data(){
        return $this->hasMany(Data::class);
    }
}
