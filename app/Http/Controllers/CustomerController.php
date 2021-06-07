<?php

namespace App\Http\Controllers;

use App\Models\Customer; 
use Illuminate\Http\Request;
use DataTables;


class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $data = Customer::select('*');
            return Datatables::of($data)
                    ->addIndexColumn()
                    ->addColumn('action', function($row){
                                $btn = '<a href="javascript:void(0)" data-toggle="tooltip"  data-id="'.$row->id.'" data-original-title="View" class="btn btn-warning btn-circle btn-sm view viewCustomer ml-1">
                                            <i class="fas fa-eye"></i>
                                        </a>';
                            $btn = $btn.'<a href="javascript:void(0)" data-toggle="tooltip"  data-id="'.$row->id.'" data-original-title="Edit" class="btn btn-info btn-circle btn-sm edit editCustomer ml-1">
                                            <i class="fas fa-edit"></i>
                                        </a>';
                                        
                           $btn = $btn.'<a href="javascript:void(0)" data-toggle="tooltip"  data-id="'.$row->id.'" data-original-title="Delete"  class="btn btn-danger btn-circle btn-sm deleteCustomer ml-1">
                                            <i class="fas fa-trash"></i
                                        </a>';
                        return $btn;
                    }) 
                    ->rawColumns(['action'])
                    ->make(true);
        }

        return view('admin.customer');
    }
     
   
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'last_name',
            'middle_name',
            'first_name',
            'birthdate',
            'gender',
            'street',
            'block_lot',
            'city',
            'zipcode',
            'province',
            'email',
            'is_active',
            'phone_number',
            'start_pay',
            'date_joined'
           ]); 


        Customer::updateOrCreate(['id' => $request->user_id],
        ['last_name' => $request->last_name, 
        'middle_name' => $request->middle_name, 
        'first_name' => $request->first_name, 
        'birthdate' => $request->birthdate, 
        'gender' => $request->gender, 
        'street' => $request->street, 
        'block_lot' => $request->block_lot, 
        'city' => $request->city, 
        'zipcode' => $request->zipcode, 
        'province' => $request->province, 
        'email' => $request->email, 
        'is_active' => $request->is_active, 
        'phone_number' => $request->phone_number, 
        'start_pay' => $request->start_pay, 
        'date_joined' => $request->date_joined]);        
        
        return response()->json(['success'=>'Post saved successfully.']);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
       
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $customer = Customer::find($id);
        return response()->json($customer);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
                      
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Customer::find($id)->delete();
        return response()->json(['success'=>'Customer deleted successfully.']);
    }
}
