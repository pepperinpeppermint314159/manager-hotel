<?php

namespace App\Http\Controllers;

use App\Models\Bookings;
use App\Models\Customers;
use App\Models\Equipment;
use App\Models\Room;
use Illuminate\Http\Request;

class BookingController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index(Request $request){
        $search = $request->get('search');
        $bookings = Bookings::query();
        if ($search){
            $bookings->whereHas('customer', function ($query) use ($search) {
                $query->where('name', 'like', '%'.$search.'%');
            });
            $bookings->orWhereHas('room', function ($query) use ($search) {
                $query->where('name', 'like', '%'.$search.'%');
            });
        }
        $bookings->orderBy('booking_date', 'DESC');
        return view('bookings.index', [ 'bookings' => $bookings->paginate() ]);
    }

    public function add(Request $request){
        $bookingId = $request->get('id');
        $booking = null;
        $roomDaDat = Bookings::query()->select(['roomId'])->where('checkout_date', null)->get();
        $rooms = Room::query()->whereNotIn('id', $roomDaDat);
        if ($bookingId){
            $booking = Bookings::query()->find($bookingId);
            if ($booking){
                $rooms->orWhere('id', $booking->roomId);
            }
        }
        $customers = Customers::query()->get();
        $equipments = Equipment::query()->where('status', 1)->get();
        return view('bookings.form', ['customers' => $customers,
            'equipments' => $equipments, 'rooms' => $rooms->get(), 'booking' => $booking]);
    }

    public function save(Request $request){
        $all = $request->except('_token');
        $booking = Bookings::query()->find($all['bookingId']);
        if ($booking){
            $booking->customerId = $all['customerId'];
            $booking->roomId = $all['roomId'];
            $booking->booking_date = $all['booking_date'];
            $booking->received_date = $all['received_date'];
            $booking->checkout_date = $all['checkout_date'];
            $booking->save();
        }else {
            $booking = Bookings::query()->create($all);
        }
        $booking->equipments()->sync($all['equipments']);
        if (!$booking){
            return redirect()->back();
        }
        if ($all['bookingId']){
            return redirect()->route('bookings.index')->with('status', 'Cập nhật bản ghi thành công.');
        }else {
            return redirect()->route('bookings.index')->with('status', 'Thêm mới bản ghi thành công.');
        }
    }

    public function delete($id){
        $booking = Bookings::query()->find($id)->delete();
        return redirect()->route('bookings.index')->with('status', 'Xóa bản ghi thành công.');
    }
}
