<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Carbon\Carbon;

class Comic extends Model
{
    use SoftDeletes;
    protected $table = 'comics';
    protected $fillable = ['title', 'thumb', 'description', 'price', 'series', 'sale_date', 'type'];

    public function getCreatedAt()
    {
        return Carbon::create($this->created_at)->format('d-m-Y');
    }

    public function getUpdatedAt()
    {
        return Carbon::create($this->updated_at)->format('d-m-Y');
    }

    public function getDeletedAt()
    {
        return Carbon::create($this->deleted_at)->format('d-m-Y');
    }
}
