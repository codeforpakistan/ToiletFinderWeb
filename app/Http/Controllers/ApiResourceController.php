<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ApiResource;
use App\Mail\ApiRequest;
use Validator;
use Mail;

class ApiResourceController extends Controller
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
        return view('apirequest');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {   

        $validator = Validator::make($request->all(), [
            'name'          => 'required|string|max:191',
            'email'         => 'required|string|email|max:191|unique:api_resource,email',
            'purpose'       => 'required|string|max:500',
            
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withInput()->withErrors($validator->errors());
        }

        $input = $request->all();
        $apirequest = ApiResource::create([
            'name'        => $input['name'],
            'email'       => $input['email'],
            'purpose'     => $input['purpose'],
            'api_token'   => str_random(60),
        ]);
        try{
            Mail::to("khanmusa92@gmail.com")->send(new ApiRequest($apirequest));
        
        }
        catch(\Exception $e){
            echo "Not Possible yet";
        }
        return redirect()->back()->with('success','Please check your Email For Access Token!');

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
