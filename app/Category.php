<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
   protected $fillable = ['title_en','title_ar','description_en','description_ar'];
}
