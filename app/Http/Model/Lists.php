<?php

namespace App\Http\Model;

use Illuminate\Database\Eloquent\Model;

class Lists extends Model
{
    protected $table = 'list';
    protected $primaryKey = 'list_id';
    public $timestamps = false;
    protected $guarded = [];
}
