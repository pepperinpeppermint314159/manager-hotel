<?php

namespace App\Http\Controllers;

use App\Models\Equipment;
use Illuminate\Http\Request;

class EquipmentController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(Request $request){
        $search = $request->get('search');
        $equipments = Equipment::query();
        if ($search){
            $equipments->where('name','like', '%.$search.%');
        }
        return view('equipment.index', [ 'equipments' => $equipments->paginate() ]);
    }

    public function add(Request $request){
        $equipmentId = $request->get('id');
        $equipment = null;
        if ($equipmentId){
            $equipment = Equipment::query()->find($equipmentId);
        }
        return view('equipment.form', ['equipment' => $equipment]);
    }

    public function save(Request $request){
        $all = $request->except('_token');
        if ($all['equipmentId']){
            $equipment = Equipment::query()->find($all['equipmentId']);
            if ($equipment){
                $equipment->name = $all['name'];
                $equipment->description = $all['description'];
                $equipment->status = $all['status'];
                $equipment->save();
                return redirect()->route('equipment.index');
            }
        }
        $equipment = Equipment::query()->create($all);
        if (!$equipment){
            return redirect()->back();
        }
        return redirect()->route('equipment.index');
    }

    public function delete($id){
        $equipment = Equipment::query()->find($id)->delete();
        return redirect()->route('equipment.index');
    }
}
