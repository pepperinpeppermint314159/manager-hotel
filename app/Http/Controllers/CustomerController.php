<?php

namespace App\Http\Controllers;

use App\Models\Customers;
use App\Models\Equipment;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index(Request $request){
        $search = $request->get('search');
        $customers = Customers::query();
        if ($search){
            $customers->where('name', 'like', '%'.$search.'%');
        }
        return view('customers.index', [ 'customers' => $customers->paginate() ]);
    }

    public function add(Request $request){
        $customerId = $request->get('id');
        $customer = null;
        if ($customerId){
            $customer = Customers::query()->find($customerId);
        }
        return view('customers.form', ['customer' => $customer]);
    }

    public function save(Request $request){
        $all = $request->except('_token');
        if ($all['customerId']){
            $customer = Customers::query()->find($all['customerId']);
            if ($customer){
                $customer->name = $all['name'];
                $customer->address = $all['address'];
                $customer->phone = $all['phone'];
                $customer->email = $all['email'];
                $customer->content = $all['content'];
                $customer->save();
                return redirect()->route('customers.index');
            }
        }
        $customer = Customers::query()->create($all);
        if (!$customer){
            return redirect()->back();
        }
        return redirect()->route('customers.index');
    }

    public function delete($id){
        $customer = Customers::query()->find($id)->delete();
        return redirect()->route('customers.index');
    }
}
