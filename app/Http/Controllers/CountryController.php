<?php

namespace App\Http\Controllers;

use App\Models\Country;
use Illuminate\Http\Request;

class CountryController extends Controller
{
    public function index()
    {
        $countries = Country::all();

        return view('panel.countries.index', compact('countries'));
    }

    public function create()
    {
        return view('panel.countries.create');
    }

    public function store(Request $request)
    {
        $country = new Country([
            'name' => $request->get('name'),
        ]);
        $country->save();

        return redirect()->route('countries.index')->with('success', 'País creado correctamente');
    }

    public function edit($id)
    {
        $country = Country::find($id);

        return view('panel.countries.edit', compact('country'));
    }

    public function update(Request $request, $id)
    {
        $country = Country::find($id);
        $country->name = $request->get('name');
        $country->save();

        return redirect()->route('countries.index')->with('success', 'País actualizado correctamente');
    }

    public function destroy($id)
    {
        $country = Country::find($id);
        $country->delete();

        return redirect()->route('countries.index')->with('success', 'País eliminado correctamente');
    }
}
