<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;
    protected $fillable = ['nis','nama','kelas_id','tgl_lahir','alamat'];
    public $timestamps =  false;

    public function kelas()
    {
        return $this->belongsTo(kelas::class);
    }
}
