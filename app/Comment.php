<?php

namespace App;

use Ghanem\Rating\Models\Rating;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $fillable = ['content','commentable_id','commentable_type','user_id'];
    public function commentable()
    {
        return $this->morphTo();
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }//end of get user for comment


    public function rating()
    {
        return $this->belongsTo(Rating::class);
    }//end of get user for comment
}
