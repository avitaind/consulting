<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Resumes extends Model
{
    public $table = 'resume';
    public $fillable = ['location','qualification','gender','dob','exprience','contact','bio','resume'];
}
