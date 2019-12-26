<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Toilet;
use App\Review;
use Validator;

class ToiletController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $toilet = Toilet::with('feedback')->paginate(15);
        return view('admin.pages.toilet.index',['toilets' => $toilet]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.pages.toilet.create');
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
            'title' => 'required|string',
            'address'  => 'required|string',
            'city'  => 'required|string',
            'longitude'  => 'required|string|unique:toilets',
            'latitude'  => 'required|string|unique:toilets',
        ]);
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        };
        $input = $request->all();
        $input['verify'] = 1;
        $data = Toilet::create($input);
        return redirect()->route('admin.toilet.index')->with('success','New Toilet has been Added Successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $toilet = Toilet::with('feedback')->find($id);
        return view('admin.pages.toilet.show',['feedba' => $toilet->feedback]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $toilets = Toilet::find($id);
        if (! $toilets ) {
            abort(404);
        };
        return view('admin.pages.toilet.edit', ['toilet' => $toilets]);
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
        $toilets = Toilet::find($id);
        if (! $toilets ) {
            abort(404);
        };
        $input = $request->all();
        $input = [
            'address' => $request->address,
            'longitude' => $request->longitude,
            'latitude' => $request->latitude,
            'verify' => 1,
        ];
        
        $toilets->update($input);
        return redirect()->route('admin.toilet.index')->with('success','Toilet data has been Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $toilets = Toilet::find($id);
        if (! $toilets ) {
            abort(404);
        };
        $toilets->delete();
        return redirect()->back()->with('warning','Data Deleted Successfully');

    }
    
    public function accept(Request $request, $id)
    {
        $toilet = Toilet::find($id);
        $toilet->verify = 1;
        $toilet->save();
        return redirect()->back()->with('info','Toilet Request Has been Approved');
    }

    public function reject(Request $request, $id)
    {
        $toilet = Toilet::find($id);
        $toilet->verify = 0;
        $toilet->save();
        return redirect()->back()->with('warning','Toilet Request Has been Declined By Department');
    }
}
