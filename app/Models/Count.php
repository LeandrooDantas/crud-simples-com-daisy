<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Count extends Model
{

    protected $fillable = [
        'product_name',
        'quantity',
        'category',
        'sector',
    ];
}
