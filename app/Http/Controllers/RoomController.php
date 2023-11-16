<?php

namespace App\Http\Controllers;

use App\Models\Room;
use Illuminate\Http\Request;

class RoomController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index(){
        $rooms = Room::query()->paginate();
        return view('rooms.index', [ 'rooms' => $rooms ]);
    }

    public function add(Request $request){
        $roomId = $request->get('id');
        $room = null;
        if ($roomId){
            $room = Room::query()->find($roomId);
        }
        return view('rooms.form', ['room' => $room]);
    }

    public function save(Request $request){
        $all = $request->except('_token');
        $room = Room::query()->create($all);
        if (!$room){
            return redirect()->back();
        }
        return redirect()->route('rooms.index');
    }

    public function delete($id){
        $room = Room::query()->find($id)->delete();
        return redirect()->route('rooms.index');
    }
}
