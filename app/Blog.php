<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\SoftDeletes;

class Blog extends Model
{
    use SoftDeletes;

    protected $fillable = ['title','description','slug'];

    public function setSlugAttribute($value) {
        $this->attributes['slug'] = Str::slug($value);
    }

    public function getNameAttribute($value) {
        return ucfirst($value);
    }
}
