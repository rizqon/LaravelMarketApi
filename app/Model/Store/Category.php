<?php

namespace App\Model\Store;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $fillable = ['title', 'slug', 'parent_id'];

    public function childs()
    {
        return $this->hasMany('App\Model\Store\Category', 'parent_id');
    }
    
    public function parent()
    {
        return $this->belongsTo('App\Model\Store\Category', 'parent_id');
    }

    public function products() {
        return $this->belongsToMany('App\Model\Store\Product', 'category_product');
    }
}
