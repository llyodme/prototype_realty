<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use DataTables;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */ 
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $data = Post::select('*');
            return Datatables::of($data)
                    ->addIndexColumn() 
                    ->addColumn('action', function($row){
                                $btn = '<a href="javascript:void(0)" data-toggle="tooltip"  data-id="'.$row->id.'" data-original-title="View" class="btn btn-warning btn-circle btn-sm view viewPost ml-1">
                                            <i class="fas fa-eye"></i>
                                        </a>';
                            $btn = $btn.'<a href="javascript:void(0)" data-toggle="tooltip"  data-id="'.$row->id.'" data-original-title="Edit" class="btn btn-info btn-circle btn-sm edit editPost ml-1">
                                            <i class="fas fa-edit"></i>
                                        </a>';
                                        
                           $btn = $btn.'<a href="javascript:void(0)" data-toggle="tooltip"  data-id="'.$row->id.'" data-original-title="Delete"  class="btn btn-danger btn-circle btn-sm deletePost ml-1">
                                            <i class="fas fa-trash"></i>
                                        </a>';
                        return $btn;
                    }) 
                    ->rawColumns(['action'])
                    ->make(true);
        }

        return view('admin.post');
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
            'title',
            'description',
            'price',
            'date'
           ]); 


        Post::updateOrCreate(['id' => $request->post_id],
        ['title' => $request->title, 
        'description' => $request->description,
        'price' => $request->price,
        'date' => $request->date]);        

        return response()->json(['success'=>'Post saved successfully.']);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */


       /**
   * public function show(Post $post)
    *{
       
   * }
    */

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $post = Post::find($id);
        return response()->json($post);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */


     /**
    *public function update(Request $request, Post $post)
    *{
       
       
    *}
    */

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Post::find($id)->delete();
        return response()->json(['success'=>'Post deleted successfully.']);
    }
} 
