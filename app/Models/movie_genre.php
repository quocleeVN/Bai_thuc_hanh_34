<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class movie_genre extends Model
{
    use HasFactory;
    protected $table = "movie_genre";
    protected $primaryKey = "id_genre";
    public $timestamps = false;
}
