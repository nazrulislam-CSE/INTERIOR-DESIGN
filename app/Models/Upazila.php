<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Upazila extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function state(){
        return $this->belongsTo('App\Models\State');
    }

    public function citie(){
        return $this->belongsTo('App\Models\Citie');
    }
}
