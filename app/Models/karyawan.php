<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class karyawan extends Model
{
    use HasFactory;
    protected $table = 'karyawans';
    protected $primaryKey = 'id';
    protected $fillable = ['gambar', 'nama', 'departemen_id', 'umur', 'jk'];

    public function departemen(){
        return $this->belongsTo(departemen::class);
    }
}
