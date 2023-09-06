<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
class StationInformation extends Model
{   // app/Models/StationInformation.php
    protected $fillable = ['stationId', 'stationType', 'Altitude', 'stuff', 'wind'];
    
    use HasFactory;
}
