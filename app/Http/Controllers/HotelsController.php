<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Hotel;

class HotelsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $hotels = Hotel::all();
        return view('admin-hotels.index', compact('hotels'));
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
        $hotel = Hotel::where('name', $request->name)->first();
        
        if($hotel){
             return redirect()->back()->with(['error'=>"Hotel name $request->name already exist."]);
        }

        Hotel::create($request->all());
        return redirect()->back()->with(['success1'=>"$request->name added successfully"]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $hotel = Hotel::findOrFail($id);
       $spaces = range(1, $hotel->capacity, 1);

        /*$booked = DB::table('spaces')
                ->where('hotels_lot_id',$id)
                ->orderBy('space_number', 'asc')
                ->get();*/

        $booked = range(1, 13);
        //return view('admin-hotels.show');
        return view('admin-hotels.show')->with(compact('hotel'))->with(compact('spaces'))->with(compact('booked'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $hotel = Hotel::findOrFail($id);
        return view('admin-hotels.edit', compact(['hotel']));
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
        
        $hotel = Hotel::findOrFail($id);
        $hotel->update($request->all());
        return redirect()->back()->with(['update'=>'Updated Succesfully']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $hotel = Hotel::findOrFail($id);
        $hotel->delete();
        return redirect()->back()->with(['success'=>"Hotel $hotel->name Deleted Succesfully"]);
    }
}
