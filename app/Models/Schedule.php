<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Schedule extends Model
{
     protected $fillable = [
          'title',
          'description',
          'start_time',
          'end_time',
          'day_of_week',
     ];

     protected $casts = [
          'start_time' => 'datetime:H:i',
          'end_time'   => 'datetime:H:i',
     ];
}
