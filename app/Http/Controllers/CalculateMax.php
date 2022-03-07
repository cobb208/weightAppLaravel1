<?php

namespace App\Http\Controllers;

use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\ValidationException;

class CalculateMax extends Controller
{


    /**
     * Display a listing of the resource.
     *
     * @return Application|Factory|View
     */
    public function index(Request $request): View|Factory|Application
    {
        $weight = $request->query('weight');
        $percentage = $request->query('percentage');

        if(isset($weight) and isset($percentage))
        {
            $data = [
                'weight' => $weight,
                'percentage' => $percentage
            ];
            $rules = [
                'weight' => 'required|numeric|min:0',
                'percentage' => 'required|numeric|min:0|max:100'
            ];

            $validator = Validator::make($data, $rules);

            if($validator->passes())
            {
                try {
                    $validated = $validator->validated();

                    $full_number = CalculateMax::generate_100_percent(intval($validated['weight']), intval($validated['percentage']));

                    $percentage_steps = array(
                        array(
                            'percentage' => 100,
                            'weight' => $full_number
                        )
                    );

                    for($i = 95; $i >= 5; $i -= 5)
                    {
                        $percent_return = $full_number * ($i / 100);
                        $percentage_steps[] = array(
                            'percentage' => $i,
                            'weight' => $percent_return
                        );
                    }

                    return view('calculateMax.index',
                        [
                            'active' => 'calculateMax',
                            'results' => [
                                'weight' => $validated['weight'],
                                'percentage' => $validated['percentage'],
                                'percentage_steps' => $percentage_steps
                            ]
                        ]
                    );


                } catch (ValidationException $_) {}
            }
        }


        return view('calculateMax.index', ['active' => 'calculateMax']);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }


    private static function generate_100_percent(int $weight, int $percentage) : int
    {
        if($weight === 100) return $weight;

        return ((100 * $weight) / $percentage);
    }


}
