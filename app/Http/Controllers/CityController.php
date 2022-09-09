<?php

namespace App\Http\Controllers;

use App\Models\City;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
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


    public function update(City $city, Request $request): RedirectResponse
    {
        $request->validate([
            'name' => 'required|unique:cities,name'
        ]);

        $city->update([
            'name' => $request->input('name')
        ]);

        return redirect('/cities')->with('success', 'The city has been edited');
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
