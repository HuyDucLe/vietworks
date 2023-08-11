<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JobSave extends Model
{
    use HasFactory;

    protected $fillable = [ 'user',	'job',	'saved',  'applied',	'accepted',	'cv' ];
    public $timestamps = false;
}
