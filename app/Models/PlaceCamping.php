<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PlaceCamping extends Model
{
    use HasFactory;
    protected $guarded = [];
    protected $table = 'place_campings';
}
