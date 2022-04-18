<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'code',
        'level1',
        'level2',
        'level3',
        'name',
        'price',
        'price_sp',
        'amount',
        'properties',
        'joint_purchase',
        'unit',
        'picture',
        'short_description',
        'description'
    ];
}
