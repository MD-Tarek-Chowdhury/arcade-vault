<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Game extends Model
{
    protected $fllable = ['title', 'emulator', 'genre', 'release_year', 'description'];
}
