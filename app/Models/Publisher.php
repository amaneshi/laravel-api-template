<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Publisher extends Model
{
    //
    use SoftDeletes;
    protected $fillable = ['name','year','located'];

    public function books() {
        return $this->hasMany(Book::class);
    }

}
