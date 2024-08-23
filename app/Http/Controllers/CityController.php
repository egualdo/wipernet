<?php

namespace App\Http\Controllers;

use App\Models\City;
use Illuminate\Http\Request;

class CityController extends Controller
{
    public function index()
    {
        $cities = City::all();
        return view('panel.cities.index', compact('cities'));
    }

    public function create()
    {
        return view('panel.cities.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|unique:cities|max:255',
        ]);

        $city = new City();
        $city->name = $request->input('name');
        $city->save();

        return redirect()->route('cities.index')
            ->with('success', 'Ciudad creada exitosamente.');
    }

    public function show(City $city)
    {
        return view('panel.cities.show', compact('city'));
    }

    public function edit(City $city)
    {
        return view('panel.cities.edit', compact('city'));
    }

    public function update(Request $request, City $city)
    {
        $request->validate([
            'name' => 'required|unique:cities,name,'.$city->id.'|max:255',
        ]);

        $city->name = $request->input('name');
        $city->save();

        return redirect()->route('cities.index')
            ->with('success', 'Ciudad actualizada exitosamente.');
    }

    public function destroy(City $city)
    {
        $city->delete();

        return redirect()->route('cities.index')
            ->with('success', 'Ciudad eliminada exitosamente.');
    }
}
