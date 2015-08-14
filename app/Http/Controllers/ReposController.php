<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Repo;

class ReposController extends Controller
{
    private $offline_data = [
        [
            "full_name" => "User1/Repo1",
            "description" => "Gangsta Repo",
            "forks_count" => 1003,
            "watchers" => 83,
            "html_url" => "https://www.google.com",
            "owner" => ["avatar_url" => "/images/kitten.jpeg"]
        ],
        [
            "full_name" => "User1/Repo1",
            "description" => "Gangsta Repo",
            "forks_count" => 1003,
            "watchers" => 83,
            "html_url" => "https://www.google.com",
            "owner" => ["avatar_url" => "/images/kitten.jpeg"]
        ],
        [
            "full_name" => "User1/Repo1",
            "description" => "Gangsta Repo",
            "forks_count" => 1003,
            "watchers" => 83,
            "html_url" => "https://www.google.com",
            "owner" => ["avatar_url" => "/images/kitten.jpeg"]
        ]
    ];
    /**
     * Show repos with greater than 10,000 stars
     *
     * @return Response
     */
    public function index()
    {
        $repo = new Repo();
        $data = $repo->getTopDogs();
        $repos = $data['items'];
        // $repos = $this->offline_data;
        return view('repos.index', compact('repos'));
    }

    /**
     * Search the github api and retrieve a response
     * @param  Request $request
     * @return Response
     */
    public function search(Request $request)
    {
        if (empty($request->input())) {
            return redirect('/');
        }

        $search     = $request->input("q");
        $language   = $request->input("language");

        // var_dump($search);
        // var_dump($language);
        // exit;
        $repo = new Repo();
        $data = $repo->search($search, $language);
        $repos = $data['items'];
        return view('repos.index', compact('repos'));
    }
}
