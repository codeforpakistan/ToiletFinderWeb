<?php

namespace App\Http\Controllers\APIs;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Toilet;
use Validator;
use DB;


class ToiletController extends APIBaseController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function filterSearch(Request $request)
    {
        $latitude  = \Request::input('latitude'); 
         $longitude = \Request::input('longitude'); 
         $max_distance = \Request::input('longitude');
         $toilet_available = \Request::input('toilet_available');
         $accessible_physical_challenge = \Request::input('accessible_physical_challenge');
   
        $data = Toilet::where('toilet_available', $toilet_available)
                ->where('accessible_physical_challenge', $accessible_physical_challenge)->select(DB::raw('*, ( 6367 * acos( cos( radians('.$latitude.') ) * cos( radians( latitude ) ) * cos( radians( longitude ) - radians('.$longitude.') ) + sin( radians('.$latitude.') )* sin( radians( latitude ) ) ) ) AS distance'))
                ->having('distance', '<=', $max_distance)
                ->orderBy('distance')
                
                ->get();
        if($data != NULL){
            return $this->respondSuccess('Here is the list of washroom',$data );
        }
        else
        {
            return $this->respondBadRequest('No Data Found',$data );
        }
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function filterBaseSearch(Request $request)
    {
        $latitude  = \Request::input('latitude'); 
         $longitude = \Request::input('longitude'); 
         $max_distance = \Request::input('longitude');
         $toilet_available = \Request::input('toilet_available');
         $accessible_physical_challenge = \Request::input('accessible_physical_challenge');
   
        $data = Toilet::where('toilet_available', $toilet_available)
                ->where('accessible_physical_challenge', $accessible_physical_challenge)->select(DB::raw('*, ( 6367 * acos( cos( radians('.$latitude.') ) * cos( radians( latitude ) ) * cos( radians( longitude ) - radians('.$longitude.') ) + sin( radians('.$latitude.') )* sin( radians( latitude ) ) ) ) AS distance'))
                ->having('distance', '<=', $max_distance)
                ->orderBy('distance')
                
                ->get();
        if($data != NULL){
            return $this->respondSuccess('Here is the list of washroom',$data );
        }
        else
        {
            return $this->respondBadRequest('No Data Found',$data );
        }
    }
    
    
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function city(Request $request)
    {
        
         $latitude  = \Request::input('latitude'); 
         $longitude = \Request::input('longitude'); 
        $data = Toilet::with('feedback')->where('city',$request->city)->where('verify','=','1')->select(['toilets.*'])
            ->selectRaw('ROUND( 6371 * acos( cos( radians(?) ) *
                           cos( radians( latitude ) )
                           * cos( radians( longitude ) - radians(?)
                           ) + sin( radians(?) ) *
                           sin( radians( latitude ) ) ), 2
                         ) AS distance', [$latitude, $longitude, $latitude])
            ->orderBy("distance", 'asc')
            ->get();
            
        
        if($data != NULL){
            return $this->respondSuccess('Here is the list of washroom',$data );
        }
        else
        {
            return $this->respondBadRequest('No Data Found',$data );
        }
    }
    
    
    /**
     * Display a listing of the resource all toilets.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
       
        $data = Toilet::with('feedback')->where('verify', '=', '1')->get();
        
        if(!empty($data))
        {
            return $this->respondSuccess('Here is the list of all washrooms',$data );
        }
        else
        {
            return $this->response->json(['success' => false, 'status' => 400,'message' => 'No Data Found']);
        }
    }
    
    public function toiletnear(Request $request){
         $latitude  = \Request::input('latitude'); 
         $longitude = \Request::input('longitude'); 
         $radius = \Request::input('radius'); 
        // Get all Toilets according to haversine distance formula :
        $toilet = Toilet::with('feedback')->select(['toilets.*'])
            ->selectRaw('ROUND( 6371 * acos( cos( radians(?) ) *
                           cos( radians( latitude ) )
                           * cos( radians( longitude ) - radians(?)
                           ) + sin( radians(?) ) *
                           sin( radians( latitude ) ) ), 2
                         ) AS distance', [$latitude, $longitude, $latitude])
                         ->havingRaw("distance < ?", [$radius])
            ->orderBy("distance", 'asc')
            ->get();
            
            
        if($toilet)
        {
            return $this->respondSuccess('Toilet Retrieved', $toilet);
        }
        else
        {
            return $this->respondBadRequest('No Toilet Retrieved');
        }
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
        $validator = Validator::make($request->all(), [
        
        'latitude' => 'required|unique:toilets',
        'longitude' => 'required|unique:toilets',
        
    ]);
       if ($validator->fails()) {
            return response()->json([
            'success'       => false,
            'response_code' => 401,
            'message'       => 'Latitude Or Longitude Already Taken',
            
        ]);
           
        }

       $input = $request->all();

        $data = Toilet::create($input);

        return $this->respondCreated('Thank you for adding details');
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
