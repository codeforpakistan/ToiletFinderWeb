<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Toilet extends Model
{
    public $table = "toilets";

    public $fillable = [
        'title',
    	'city',
    	'address',
		'latitude',
		'longitude',
		'verify',
        'added_by',
        'toilet_available',
        'parking',
        'sanitary_disposal_bin',
        'soap',
        'payment_required',
        'providers',
        'hand_wash',
        'soap',
        'accessible_physical_challenge'
    ];

    /**
     * Get the user that owns the recipe.
     */
    public function feedback()
    {
        return $this->hasMany(\App\Review::class, 'toilet_id', 'id');
    }
    
   
}
