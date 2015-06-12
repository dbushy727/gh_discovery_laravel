<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class API extends Model
{
	/**
	 * Initiate get request from github api
	 * @param  string  $uri  api uri to dictate 
	 * which api to hit with what parameters
	 * 
	 * @param  boolean $json flag to denote whether 
	 * to return object in json or raw format
	 * 
	 * @return json | string api result set
	 */
    static function get($uri, $array = true)
    {
		$ch = curl_init();

	    $options = array(
	    	CURLOPT_URL => getenv("GITHUB_API").$uri, 
	    	CURLOPT_RETURNTRANSFER => 1, 
	    	CURLOPT_HTTPHEADER => array(
	    		"User-Agent:".getenv("APP_NAME")));

	    curl_setopt_array($ch, $options);

	    $data = curl_exec($ch);

	    return $array ? json_decode($data, true) : $data;
    }
}
