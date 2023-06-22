<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Jenssegers\Mongodb\Eloquent\Model;

class Cars extends Model
{
    use HasFactory;
    protected $connection = "mongodb";
    protected $collection = "cars";

    protected $fillable = [
        'nopol',
        'merk',
        'carModel',
        'kilometerAwal',
        'pitcure1',
        'pitcure2',
        'pitcure3',
        'warna',
        'passenger',
        'detail',
        'status',
    ];
}
