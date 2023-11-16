<?php

namespace App\Http\Controllers;

use App\Models\Bookings;
use App\Models\Customers;
use App\Models\Equipment;
use App\Models\Room;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashBoardController extends Controller
{
    protected $name;
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(){
        $roomHoatDong = Room::query()->where('status', 1)->count();
        $roomKhongHoatDong = Room::query()->where('status', 2)->count();

        $totalCustomer = Customers::query()->count();
        $totalRoom = Room::query()->count();
        $totalEquipment = Equipment::query()->count();


        $bookingDaDat = Bookings::query()->whereNotNull('booking_date')->whereNull('received_date')->whereNull('checkout_date')->count();
        $bookingDangSudung = Bookings::query()->whereNotNull('booking_date')->whereNotNull('received_date')->whereNull('checkout_date')->count();
        $bookingDaTra = Bookings::query()->whereNotNull('booking_date')->whereNotNull('received_date')->whereNotNull('checkout_date')->count();

        $totalBooking = Bookings::query()->count();


        return view('dashboard.index', ['roomHoatDong' => $roomHoatDong, 'roomKhongHoatDong' => $roomKhongHoatDong,
            'totalCustomer' => $totalCustomer, 'totalRoom' => $totalRoom, 'totalEquipment' => $totalEquipment,
            'bookingDaDat' => $bookingDaDat, 'bookingDangSudung' => $bookingDangSudung, 'bookingDaTra' => $bookingDaTra,
            'totalBooking' => $totalBooking
            ]);
    }
}
