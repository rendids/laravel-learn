<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class penugasan extends Model
{
    use HasFactory;
    protected $table = 'penugasans';
    protected $primaryKey = 'id';
    protected $fillable = ['karyawan_id', 'proyek_id', 'deskripsi'];

    public function karyawan()
    {
        return $this->belongsTo(Karyawan::class,);
    }

    public function proyek()
    {
        return $this->belongsTo(Proyek::class,);
    }
}
