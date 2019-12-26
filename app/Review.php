<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    public $table = "review";

    public $fillable = [
    	'toilet_id',
    	'email',
    	'name',
		'review',
		'picture',
		'comments',
    ];

    /**
     * Get the user that owns the recipe.
     */
    public function toilet()
    {
        return $this->belongsTo(\App\Toilet::class, 'toilet_id', 'id');
    }

    
}
