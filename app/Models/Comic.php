<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Comic extends Model
{
    use SoftDeletes;
    protected $table = 'comics';
    protected $fillable = ['title', 'thumb', 'description', 'price', 'series', 'sale_date', 'type'];
}
