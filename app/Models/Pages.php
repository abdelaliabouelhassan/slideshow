<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pages extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function images(){
        return $this->hasMany(Images::class,'page_id');
    }
}
