<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Toilet;
use Validator;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {

    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $markers = Toilet::all();
        
        return view('welcome',['markers' => $markers]);
    }


    /**
     * Show the about us page.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function aboutus()
    {
        return view('aboutus');
    }


    /**
     * Show the contact us page.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function contactus()
    {
        return view('contactus');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function create()
    {
        return view('home');
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
            'address'  => 'required|string',
            'city'  => 'required|string',
            'longitude'  => 'required|string',
            'latitude'  => 'required|string',
        ]);
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        };
        $input = $request->all();
        $input['verify'] = 0;
        $data = Toilet::create($input);
        return redirect()->route('home')->with('success','Thanks For Providing Details!');

    }
}
