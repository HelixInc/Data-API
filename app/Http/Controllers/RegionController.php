<?php

namespace App\Http\Controllers;

use App\Region;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Validator;

class RegionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $regions = Region::all();
        if (count($regions) > 0) {
            return response(
                [
                    'data' => [
                        'regions' => $regions
                    ],
                ],
                200)->header('Content-Type', 'application/vnd.api+json');
        }

        return response(
            [
                'errors' => [
                    'regions' => 'No data found'
                ],
            ],
            404)->header('Content-Type', 'application/vnd.api+json');
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
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|max:255|unique:regions',
            'abbreviation' => 'required|max:255|unique:regions',
            'population' => 'required',
            'area' => 'required',
            'capital' => 'required',
            'population_density' => 'required',
        ]);

        if($validator->fails()){
            return response([
                'errors' => $validator->errors(),
            ],400
            )->header('Content-Type', 'application/vnd.api+json');
        }

        $region = new Region();
        $region->name = $request->input('name');
        $region->abbreviation = $request->input('abbreviation');
        $region->population = $request->input('population');
        $region->area = $request->input('area');
        $region->capital = $request->input('capital');
        $region->population_density = $request->input('population_density');
        $region->save();

        return response(
            [
                'data' => [
                    'region' => $region
                ],
            ],
            201
        )->header('Content-Type', 'application/vnd.api+json');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public
    function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public
    function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public
    function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public
    function destroy($id)
    {
        //
    }
}
