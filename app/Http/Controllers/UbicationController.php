<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Ubication;
use Illuminate\Support\Facades\Auth;

class UbicationController extends Controller
{
       /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $id=Auth::id();
        $ubications = Ubication::all()->where('user_id',$id);
        return view('ubications.index', compact('ubications'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('ubications.create');
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
        'name'=>'required|string',
        'latitude'=>'required|string',
        'longitude'=>'required|string',
        'description'=>'required|string'
          ]);
          $ubication = new Ubication([
            'name'=>$request->get('name'),
            'user_id'=>Auth::id(),
            'latitude'=>$request->get('latitude'),
            'longitude'=>$request->get('longitude'),
            'description'=>$request->get('description')
          ]);
          $ubication->save();
          return redirect('/index')->with('success', 'Ubication has been added.');
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
        $ubication = Ubication::find($id);

        return view('ubications.edit', compact('ubication'));
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
        $request->validate([
            'name'=>'required|string',
            'latitude'=>'required|string',
            'longitude'=>'required|string',
            'description'=>'required|string'
          ]);
    
          $ubication = Ubication::find($id);
          $ubication->name = $request->get('name');
          $ubication->latitude = $request->get('latitude');
          $ubication->longitude = $request->get('longitude');
          $ubication->description = $request->get('description');
          $ubication->save();
    
          return redirect('/ubications')->with('success', 'Ubication has been updated.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $ubication = Ubication::find($id);
        $ubication->delete();

        return redirect('/ubications')->with('success', 'Ubication has been deleted Successfully.');
    }

    public function getUbications()
    {
        $result=Ubication::all();
        
        if (!is_null($result))
        {
        return response()->json(['state'=>"OK",
                                 'result'=>$result,
                                ]);
        }
        else
        {
            return response()->json(['state'=>"ERROR",
                                    'message'=>"Hubo un errror en getUbications."]);
        }
    }
}
