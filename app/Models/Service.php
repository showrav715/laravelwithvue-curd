<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    use HasFactory;

     protected $fillable = ['title', 'details', 'slug','image'];
    //  timestamps are not needed
     public $timestamps = false;
}
