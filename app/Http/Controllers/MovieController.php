<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class MovieController extends Controller
{
    public function genres()
    {
        $data = DB::table('genre')
            ->select('genre_name', 'genre_name_vn')
            ->get();

        return view('movies', ['type' => 'genres', 'data' => $data]);
    }

    public function topRated()
    {
        $data = DB::table('movie')
            ->select('movie_name', 'release_date', 'vote_average')
            ->orderByDesc('vote_average')
            ->limit(10)
            ->get();

        return view('movies', ['type' => 'topRated', 'data' => $data]);
    }

    public function topBudget()
    {
        $data = DB::table('movie')
            ->select('movie_name', 'release_date', 'budget')
            ->orderByDesc('budget')
            ->limit(10)
            ->get();

        return view('movies', ['type' => 'topBudget', 'data' => $data]);
    }

    public function longMovies()
    {
        $data = DB::table('movie')
            ->select('movie_name', 'release_date', 'runtime')
            ->where('runtime', '>', 120)
            ->get();

        return view('movies', ['type' => 'longMovies', 'data' => $data]);
    }

    public function canadaMovies()
    {
        $data = DB::table('movie')
            ->select('movie_name', 'release_date', 'runtime')
            ->where('country_name', 'Canada')
            ->get();

        return view('movies', ['type' => 'canadaMovies', 'data' => $data]);
    }

    public function actionMovies()
    {
        $data = DB::table('movie')
            ->select('movie_name', 'release_date', 'overview', 'image_link')
            ->get();

        return view('movies', ['type' => 'actionMovies', 'data' => $data]);
    }

    public function popularMovies()
    {
        $data = DB::table('movie')
            ->select('movie_name', 'release_date', 'overview', 'image_link')
            ->where('vote_average', '>', 8)
            ->where('vote_count', '>', 10000)
            ->get();

        return view('movies', ['type' => 'popularMovies', 'data' => $data]);
    }
}