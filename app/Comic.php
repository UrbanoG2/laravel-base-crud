<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comic extends Model
{
    protected $fillable = [
        "title",
        "number",
        "price",
        "description",
        "author",
    ];
}
