<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class File extends Model
{
    use SoftDeletes;
    protected $fillable=['file_path','fileable_id','fileable_type'];
    function  fileable(){
        return $this->morphTo();
    }
}
