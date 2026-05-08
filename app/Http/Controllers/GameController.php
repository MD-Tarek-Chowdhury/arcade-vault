<?php

namespace App\Http\Controllers;

use App\Models\Game;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Inertia\Inertia;

class GameController extends Controller
{
    public function index()
    {
        $game = Game::all(); // Game::all() is the Model itself
        return Inertia::render('ArcadeDashboard', [
            'game' => $game
        ]);
    }

    public function destroy(Game $game): RedirectResponse
    {
        $game->delete();

        return back()->with('success', 'Game deleted successfully.');
    }
}
