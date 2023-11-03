<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class departemen extends Model
{
    use HasFactory;
    protected $table = 'departemens';
    protected $primaryKey = 'id';
    protected $fillable = ['name', 'location',];

}
