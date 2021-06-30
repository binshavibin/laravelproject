<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
      public $table = "project";
     protected $fillable =['title','description','deadline','percentage','project_owner','shortcode'];
     

}
