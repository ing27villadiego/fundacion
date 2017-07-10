<?php

namespace App\Funpacol\Entities;

use Illuminate\Database\Eloquent\Model;

class Promoter extends Model
{
    protected $fillable  = ['first_name','last_name','document','address','cell_phone','email','state'];

    public function city()
    {
        return $this->belongsTo(City::class);
    }



}
