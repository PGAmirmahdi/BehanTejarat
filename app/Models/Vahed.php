<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vahed extends Model
{
    use HasFactory;
    protected $table = "vahed";
    protected $fillable = [
        'VahedName',
        'VahedName2'
    ];
}
