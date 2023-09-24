<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Booked_Package extends Model
{
    use HasFactory;
    protected $fillable = ['booking_code','name','phone','arrival_date','depature_date','tent_id' ,'email' ,'total_price','status'];

    // public function rooms() {
    //     return $this->belongsTo(Room::class,'room_id','id');
    // }
    // public function accessories() {
    //     return $this->belongsTo(Accessories::class,'accessories_id','id');
    // }
}
