<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Resume extends Model
{
    public $table = 'resumes';
    public $fillable = ['user_id','location','qualification','gender','dob','exprience','contact','bio','resume'];
}

