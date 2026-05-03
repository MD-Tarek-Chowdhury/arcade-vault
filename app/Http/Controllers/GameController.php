<?php

namespace App\Http\Controllers;

use App\Models\Game;
use Illuminate\Http\Request;
use Inertia\Inertia;

class GameController extends Controller
{
    public function index(Game $model)
    {
        $game = Game::all();
        return Inertia::render('ArcadeDashboard', [
            'game' => $game
        ]);
    }
}
