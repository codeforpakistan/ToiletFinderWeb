<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ApiResource extends Model
{
    public $table = "api_resource";

    public $fillable = [
    	'name',
		'email',
		'purpose',
		'api_token',
    ];
}
