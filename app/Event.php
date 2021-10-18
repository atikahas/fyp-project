<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Event extends Model
{
    use SoftDeletes;
    protected $table = 'tbl_event';
    protected $guarded = ['id'];
    protected $dates = ['deleted_at'];
}
