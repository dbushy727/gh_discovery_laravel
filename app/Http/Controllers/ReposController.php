<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Repo;

class ReposController extends Controller
{
    public function index()
    {
    	return Repo::getTopDogs();
    }
}
