<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Relations\MorphToMany;

class Bookings extends Model
{
    use HasFactory;
    protected $table = 'bookings';
    protected $primaryKey = 'bookingId';
    protected $fillable = ['customerId', 'roomId', 'booking_date', 'received_date', 'checkout_date'];

    public function equipments()
    {
        return $this->belongsToMany(Equipment::class,'booking_equipment','bookingId','equipmentId');
    }

    /**
     * Get the comments for the blog post.
     */
    public function customer(): HasOne
    {
        return $this->hasOne(Customers::class, 'customerId', 'customerId');
    }

    /**
     * Get the comments for the blog post.
     */
    public function room(): HasOne
    {
        return $this->hasOne(Room::class, 'id', 'roomId');
    }
}
