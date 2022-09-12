<?php

namespace App\Http\Controllers;

use App\Models\City;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\View\View;

class CityController extends Controller
{
    public function index(): View
    {
        return view('CitiesAdmin',[
            'cities' => City::paginate()
        ]);
    }

    public function store(Request $request): RedirectResponse
    {
        $name = $request->validate([
            'name' => 'required|unique:cities,name'
        ]);

        City::create($name);

        return redirect('/cities')->with('success', 'The city has been added');
    }


    public function update(City $city, Request $request): JsonResponse
    {
        $request->validate([
            'name' => ['required', Rule::unique('cities','name')->ignore($city)]
        ]);

        $city->update([
            'name' => $request->name
        ]);

        return response()->json(['name'=>$city->name]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(City $city)
    {
        $city->delete();
        return response()->json(['respuesta'=>0]);
    }
}
