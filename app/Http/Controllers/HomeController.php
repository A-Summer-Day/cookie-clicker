<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Score;

class HomeController extends Controller
{
    public function index() {
        $score = Score::find(1);
        return response()->view('welcome',[
            'score' => $score->current_score
        ]);
    }
    public function updateScore(Request $request) {
        //$score = $request->input('score');
        $score = Score::find(1);
        $score->current_score = $score->current_score + 1;
        $score->save();

        return response()->json(['score' => $score->current_score]);
    }
}
