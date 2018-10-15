<?php

namespace App\Http\Model;

use Illuminate\Database\Eloquent\Model;

class Lendlist extends Model
{
    protected $table = 'lender_his';
    protected $primaryKey = 'his_id';
    public $timestamps = false;
    protected $guarded = [];
}
