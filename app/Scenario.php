<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Scenario extends Model
{
    protected $table = 'scenarios';
    
    protected $fillable = [
        'order', 'validation', 'is_valid', 'status'
    ];
}
