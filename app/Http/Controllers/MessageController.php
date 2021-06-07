<?php

namespace App\Http\Controllers;

use App\Models\Message;
use Illuminate\Http\Request;
use DataTables;

class MessageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $data = Message::select('*');
            return Datatables::of($data)
                    ->addIndexColumn()
                    ->addColumn('action', function($row){
                                $btn = '<a href="javascript:void(0)" data-toggle="tooltip"  data-id="'.$row->id.'" data-original-title="View" class="btn btn-warning btn-circle btn-sm view viewMessage ml-4">
                                            <i class="fas fa-eye"></i>
                                        </a>';   
                           $btn = $btn.'<a href="javascript:void(0)" data-toggle="tooltip"  data-id="'.$row->id.'" data-original-title="Delete"  class="btn btn-danger btn-circle btn-sm deleteMessage ml-1">
                                            <i class="fas fa-trash"></i>
                                        </a>';
                        return $btn;
                    }) 
                    ->rawColumns(['action'])
                    ->make(true);
        }

        return view('admin.message');
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
            'name',
            'email',
            'phone_number',
            'content',
            'date_recieved'
           ]); 


        Message::updateOrCreate(['id' => $request->message_id],
        ['name' => $request->name, 
        'email' => $request->email,
        'phone_number' => $request->phone_number,
        'content' => $request->content,
        'date_recieved' => $request->date_recieved]);        

        return response()->json(['success'=>'Message saved successfully.']);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Message  $message
     * @return \Illuminate\Http\Response
     */
    public function show(Message $message)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Message  $message
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $message = Message::find($id);
        return response()->json($message);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Message  $message
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Message $message)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Message  $message
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Message::find($id)->delete();
        return response()->json(['success'=>'Message deleted successfully.']);
    }
}
