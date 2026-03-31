<?php

namespace App\Http\Controllers;

use App\Models\genre;
use App\Models\movie;
use App\Models\movie_genre;




use Illuminate\Http\Request;

class Controller_movie extends Controller
{
    //

    //7.1
    function ds_theloai()
    {
        $theloai = genre::all();
        return view('ds_theloai', compact('theloai'));
    }

    //7.2
    function topvote()
    {
        $top = movie::select('movie_name', 'release_date', 'vote_average')->orderby('vote_average', 'desc')->limit(10)->get();
        return view('topvote', compact('top'));
    }

    //7.3
    function topbudget()
    {
        $topb = movie::select('movie_name', 'release_date', 'budget')->orderby('budget', 'desc')->limit(10)->get();
        return view('topbudget', compact('topb'));
    }

    //7.4
    function topruntime()
    {
        $toptime = movie::select('movie_name', 'release_date', 'runtime')->where('runtime', '>', 120)->limit(10)->get();
        return view('runtime', compact('toptime'));
    }

    //7.5
    function canada_movie()
    {
        $cana = movie::select('movie_name', 'release_date', 'runtime')->where('country_name', 'canada')->get();
        return view('canada_movie', compact('cana'));
    }

    //7.6
    function action_movie()
    {
        $movie_act = movie::join('movie_genre as mg', 'id', '=', 'mg.id_movie')->select('movie_name', 'release_date', 'runtime', 'overview', 'image_link')->where('country_name', 'canada')->get();
        return view('action_movie', compact('movie_act'));
    }

    //7.7
    function vote_movie()
    {
        $vote = movie::select('movie_name', 'release_date', 'runtime', 'overview', 'image_link')->where('vote_average', '>', 8)->where('vote_count', '>', 10000)->get();
        return view('vote_movie', compact('vote'));
    }
}
