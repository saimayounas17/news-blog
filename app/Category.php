<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
     // table name
     protected $table = 'categories';
     //primary key
        public $primarykey = 'id';
     // timestamps
        public $timestamps = true;  
          
        public function user(){
           return $this->belongsTo('App\User');
        }
}