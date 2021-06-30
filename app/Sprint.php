<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sprint extends Model
{
      public $table = "sprint";
      protected $fillable =['name','description','project_id'];
     

}
