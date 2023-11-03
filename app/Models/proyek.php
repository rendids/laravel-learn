<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class proyek extends Model
{
    use HasFactory;

    protected $table = 'proyek';
    protected $fillable = ['nama_proyek', 'deskripsi', 'tanggal_mulai', 'tanggal_selesai', 'tanggal_selesai_pasti'];

}
