<?php

namespace App\Models;

use App\Models\Data;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use HasFactory, HasUuids;

    protected $guarded = ['id'];

    public function data(){
        return $this->hasMany(Data::class);
    }
}
