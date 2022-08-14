<?php

namespace App\Http\Controllers;

use App\Models\Card;
use Illuminate\Http\Request;
use App\Events\ScoreUpdated;
use App\Models\User;

class CardController extends Controller
{
    public function show($id) {
        $card = Card::find($id);
        $user = auth()->user();
        $user->score = $user->score + 1;
        $user->save();

        event(new ScoreUpdated($user)); // broadcast `ScoreUpdated` event

        return redirect()->back()->withValue($card->value);
    }

    public function leaderboard () {
        return User::all(['id', 'name', 'score']);
    }
}
