<?php

namespace App\Http\Model;

use Illuminate\Database\Eloquent\Model;

class Lendform extends Model
{
    protected $table = 'lendform';
    protected $primaryKey = 'lender_id';
    public $timestamps = false;
    protected $guarded = [];
}
