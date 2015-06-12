<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Repo extends Model
{
	/**
	 * search the github api for a query and/or language
	 * @param  string  $query      	search string
	 * @param  string  $language   	choose language to filter
	 * @param  integer $page_limit 	set result limit
	 * 
	 * @return json
	 */
    function search($query, $language = '', $page_limit = 25)
    {
    	if(!empty($language))
    	{
    		$query .= "+language:$language";
    	}

    	$uri = "search/repositories?q={$query}&per_page={$page_limit}";
    	return API::get($uri);
    }
}
