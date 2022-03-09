<?php

namespace App\Http\Controllers;

use App\Events\UpdateScore;
use Illuminate\Http\Request;
use App\Models\Score;

class HomeController extends Controller
{
    public function index() {
        $score = Score::find(1);
        //event(new UpdateScore());
        broadcast(new UpdateScore($score));
        return response()->view('welcome',[
            'score' => $score->current_score
        ]);
    }
    public function updateScore(Request $request) {
        //$score = $request->input('score');
        $score = Score::find(1);
        $score->current_score = $score->current_score + 1;
        $score->save();
        broadcast(new UpdateScore($score));
        return response()->json(['score' => $score->current_score]);
    }

    public function broadcast()
    {
        $score = Score::find(1);
        //event(new UpdateScore());
        broadcast(new UpdateScore($score));
    }
}
