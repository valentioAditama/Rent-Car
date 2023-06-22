<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Jenssegers\Mongodb\Eloquent\Model;

class TrippedHistory extends Model
{
    use HasFactory;
    protected $connection = "mongodb";
    protected $collection = "tripped_history";

    protected $fillable = [
        'nopol',
        'date_in',
        'date_out',
        'time_in',
        'time_out',
        'car_model',
        'customer_nic',
        'customer_name',
        'contact',
        'agent',
        'total_amount'
    ];
}
