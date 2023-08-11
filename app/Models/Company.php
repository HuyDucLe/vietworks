<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    use HasFactory;

    protected $fillable = [ 'name', 'intro', 'logo', 'employees', 'address', 
                            'contact', 'website', 'email'];
    public $timestamps = false;
}
