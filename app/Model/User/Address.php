<?php

namespace App\Model\User;

use Illuminate\Database\Eloquent\Model;

class Address extends Model
{
    protected $fillable = ['user_id', 'name', 'fulladdress','phone', 'province', 'kecamatan'];

    public function user()
    {
        return $this->belongsTo('App\Model\User\User');
    }
}