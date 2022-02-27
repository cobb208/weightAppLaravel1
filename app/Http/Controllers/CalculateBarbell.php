<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

const WEIGHT_VALUES = array(
    45,
    35,
    25,
    15,
    10,
    5,
    2.5
);

class CalculateBarbell extends Controller
{
    public function index(Request $request)
    {
        return view('barbellcalc.index');
    }

    public function calculate(Request $request){

        $data = $request->all();
        $barbell_goal = intval($data['targetWeight']) - intval($data['barbellWeight']);
        $results = array();

        for($i = 0; $i < count(WEIGHT_VALUES); $i++)
        {
            $count = floor($barbell_goal / (WEIGHT_VALUES[$i] * 2));
            $count *= 2;

            $results[] = array(
                'weight' => WEIGHT_VALUES[$i],
                'count' => $count
            );

            $barbell_goal -= WEIGHT_VALUES[$i] * $count;
        }


        return response()->json($results);
    }
}
