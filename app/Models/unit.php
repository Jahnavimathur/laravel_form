<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class unit extends Model
{
    use HasFactory;
    public $timestamps=false;
    protected $table='units';
    protected $fillable=(
        'unit'
    );
}
