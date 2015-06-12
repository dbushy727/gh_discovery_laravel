<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Repo;

class ReposController extends Controller
{
	/**
	 * Show repos with greater than 10,000 stars
	 * 
	 * @return Response
	 */
    public function index()
    {
    	$data = Repo::getTopDogs();
    	$repos = $data['items'];
    	return view('repos.index', compact('repos'));
    }

    /**
     * Search the github api and retrieve a response
     * @param  Request $request
     * @return Response
     */
    public function search(Request $request)
    {
    	if(empty($request->input())) return redirect('/');

    	$search     = $request->input("q");
    	$language   = $request->input("language");

    	$data = Repo::search($search, $language);
    	$repos = $data['items'];
    	return view('repos.index', compact('repos'));
    }
}
