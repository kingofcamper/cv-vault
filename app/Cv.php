<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Cv extends Model
{
    use SoftDeletes;

    public function user(){

        return $this->belongsTo('App\User'); 
    }

     public function experiences(){

        return $this->hasMany('App\Experience'); 
    }

    public function projets(){

        return $this->hasMany('App\Projet'); 
    }

    public function competences(){

        return $this->hasMany('App\Competence'); 
    }

    public function formations(){

        return $this->hasMany('App\Formation'); 
    }
}

