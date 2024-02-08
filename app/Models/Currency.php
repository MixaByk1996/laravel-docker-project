<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Currency extends Model
{
    use HasFactory;
    protected $table = 'currency';
    protected $fillable = [
      'entity',
      'currency',
      'alpha_code',
      'number_code',
      'minor_unit',
      'is_active'
    ];
}
