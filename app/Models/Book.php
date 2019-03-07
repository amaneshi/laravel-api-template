<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Book extends Model
{
    use SoftDeletes;

    protected $fillable = ['name',
        'author',
        'year'];

    public function publisher() {
        return $this->belongsTo(Publisher::class);

    }
}
