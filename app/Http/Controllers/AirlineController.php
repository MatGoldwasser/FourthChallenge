<?php

namespace App\Http\Controllers;

use App\Models\Airline;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class AirlineController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('Airlines',[
            'airlines' => Airline::paginate(20)
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request):RedirectResponse
    {
        $attributes = $request->validate([
            'name' => 'required|unique:airlines,name',
            'description' => 'required'
        ]);

        Airline::create($attributes);

        return redirect('/airlines')->with('success', 'The city has been added');
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
    public function update(Airline $airline, Request $request): JsonResponse
    {
        $request->validate([
            'name' => ['required', Rule::unique('airlines','name')->ignore($airline)],
            'description' => ['required']
        ]);

        $airline->update([
            'name' => $request->input('name'),
            'description' => $request->input('description')
        ]);

        return response()->json(['name'=>$airline->name,
                                 'description'=>$airline->description]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Airline $airline):JsonResponse
    {
        $airline->delete();
        return response()->json(['respuesta'=>0]);


    }
}
