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

    /**
     * find a particular github repo
     * @param  string 	$owner github username
     * @param  string 	$repo  repository name
     * 
     * @return json
     */
    function find($owner,$repo)
    {
    	$uri = "repos/$owner/$repo";
    	return API::get($uri);
    }

    /**
     * get all repos that have over 10,000 stars
     * @return json
     */
    function getTopDogs()
    {
    	$uri = "search/repositories?q=stars:10000..*";
    	return API::get($uri);
    }
}
