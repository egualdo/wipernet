<?php

namespace App\Http\Controllers;

use App\Models\Idiom;
use Illuminate\Http\Request;
use App\Http\Requests\StoreIdiomRequest;
use App\Http\Requests\UpdateIdiomRequest;

class IdiomController extends Controller
{public function index()
    {
        $idioms = Idiom::all();

        return view('panel.idioms.index', compact('idioms'));
    }

    public function create()
    {
        return view('panel.idioms.create');
    }

    public function store(Request $request)
    {
        $idiom = new Idiom([
            'name' => $request->get('name'),
            'acronym' => $request->get('acronym'),
        ]);
        $idiom->save();

        return redirect()->route('idioms.index')->with('success', 'Idioma creado correctamente');
    }

    public function edit($id)
    {
        $idiom = Idiom::find($id);

        return view('panel.idioms.edit', compact('idiom'));
    }

    public function update(Request $request, $id)
    {
        $idiom = Idiom::find($id);
        $idiom->name = $request->get('name');
        $idiom->acronym = $request->get('acronym');
        $idiom->save();

        return redirect()->route('idioms.index')->with('success', 'Idioma actualizado correctamente');
    }

    public function destroy($id)
    {
        $idiom = Idiom::find($id);
        $idiom->delete();

        return redirect()->route('idioms.index')->with('success', 'Idioma eliminado correctamente');
    }
}