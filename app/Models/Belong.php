<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Belong extends Model
{
    use HasFactory;

    protected $table = 'belong';
    protected $guarded;
}
