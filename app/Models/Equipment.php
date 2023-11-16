<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Equipment extends Model
{
    use HasFactory;

    protected $table = 'equipment';
    protected $primaryKey = 'equipmentId';
    protected $fillable = ['name', 'description', 'status'];


    public function bookings()
    {
        return $this->belongsToMany(Bookings::class,'booking_equipment','equipmentId','bookingId');
    }

}
