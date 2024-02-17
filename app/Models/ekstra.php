<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ekstra extends Model
{
    use HasFactory;
    protected $fillable = ['id','nama','pembina','deskripsi'];
    public $timestamps =  false;
}
