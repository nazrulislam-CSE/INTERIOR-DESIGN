<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Citie extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function state(){
        return $this->belongsTo('App\Models\State');
    }
}
