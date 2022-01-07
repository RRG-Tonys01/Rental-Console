<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Game;

class GameController extends Controller
{
    function show()
    {
      $game = Game::all();
      // dd($game);
      // return view('Game', compact('game'));
      return view('Game',['Games'=>$game]);
    }
}
