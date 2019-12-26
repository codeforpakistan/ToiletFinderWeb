<?php

namespace App\Http\Controllers\APIs;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Review;
use App\Toilet;
use App\User;

class FeedbackController extends APIBaseController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Review::all()->toArray();

        return $this->respondSuccess('Here is the list of Review',$data );
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
        $toilet = Toilet::find($request->toilet_id);
        if (! $toilet) {
            return $this->respondNotFound('You have trying wrong id','');
        }
        
        
        $path = $request->file('picture')->store('toilet_images/', 'public_storage');

        $data = Review::create([
            'toilet_id' => $toilet->id,
            'name' => $request->name,
            'email' => $request->email,
            'review' => $request->review,
            'picture' => asset('public_storage/' . $path),
            'comments' => $request->comments,
        ]);

        return $this->respondCreated('Thank you for adding details',$data);
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
}
