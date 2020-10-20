<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    protected $guarded = ['id'];
    protected $with = ["options"];
    
    public function options(){
        return $this->hasOne(Option::class);
    }

    public function category(){
        return $this->belongsTo(Category::class);
    }
}
