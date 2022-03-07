<?php

namespace App\Http\Controllers;

use Exception;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

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
        $weight = $request->query('weight');
        if(isset($weight))
        {
            return view('barbellCalculator.index',
                [
                    'active' => 'barbellCalculator',
                    'weight' => $weight
                ]
            );
        }

        return view('barbellCalculator.index', ['active' => 'barbellCalculator']);
    }

    public function calculate(Request $request): JsonResponse
    {

        $data = $request->all();

        $rules = [
            'targetWeight' => 'required|numeric',
            'barbellWeight' => 'required|numeric'
        ];

        $validator = Validator::make($data, $rules);

        if($validator->passes())
        {
            try {
                $validated = $validator->validated();

                $barbell_goal = intval($validated['targetWeight']) - intval($validated['barbellWeight']);
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

            } catch (Exception $_) {}
        }

        return response()->json(['weight' => 0,'count' => 0]);
    }
}
