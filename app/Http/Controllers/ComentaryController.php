<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Comentary;

class ComentaryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        $comentaries = Comentary::all();
        return view('comentaries.index', compact('comentaries'));
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function postNewComentary(Request $request)
    {
        $request->validate([
            'ubication_id'=>'required|string',
            'description'=>'required|string',
            'payment'=>'required|string',
            'email'=>'required|string',
              ]);
              $comentary = new Comentary([
                'ubication_id'=> $request->input('ubication_id'),
                'description'=>$request->input('description'),
                'payment'=>$request->input('payment'),
                'email'=>$request->input('email'),
              ]);
              $comentary->save();
              
              return response()->json(['state'=>"OK"]);
                
    }



}
