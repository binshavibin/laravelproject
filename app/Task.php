<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
      public $table = "task";
      protected $fillable =['title','description','task_type','created_by','status','shortcode','project_id','priority'];
     

}
