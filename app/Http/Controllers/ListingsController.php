<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Listing;

class ListingsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('createlisting');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //Validation
        $this->validate($request, [
            'name' => 'required',
            'website' => 'required',
            'email' => 'email',
            'phone' => 'required',
            'adress' => 'required',
            'bio' => 'required'
        ]);

        //Create new listing with form input
        $listing = new Listing;
        $listing->name = $request->input('name');
        $listing->website = $request->input('website');
        $listing->email = $request->input('email');
        $listing->phone = $request->input('phone');
        $listing->adress = $request->input('adress');
        $listing->bio = $request->input('bio');

        //Logged in user id
        $listing->user_id = auth()->user()->id;    
        //Save listing to DB
        $listing->save();
        //Redirect
        return redirect('/dashboard')->with('success', 'Listing added');

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
        //Show current values of listing we are trying to edit
        $listing = Listing::find($id);
        return view('editlisting')->with('listing', $listing);
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
        //Validation
        $this->validate($request, [
            'name' => 'required',
            'website' => 'required',
            'email' => 'email',
            'phone' => 'required',
            'adress' => 'required',
            'bio' => 'required'
        ]);

        //Create new listing with form input
        $listing = Listing::find($id);
        $listing->name = $request->input('name');
        $listing->website = $request->input('website');
        $listing->email = $request->input('email');
        $listing->phone = $request->input('phone');
        $listing->adress = $request->input('adress');
        $listing->bio = $request->input('bio');

        //Logged in user id
        $listing->user_id = auth()->user()->id;    
        //Save listing to DB
        $listing->save();
        //Redirect
        return redirect('/dashboard')->with('success', 'Listing updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $listing = Listing::find($id);
        $listing->delete();

        return redirect('/dashboard')->with('success', 'Listing removed');
    }
}
