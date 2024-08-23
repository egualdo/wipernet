<?php

namespace App\Http\Controllers;

use App\Models\Tags;
// use App\Models\tagIdiom;
use App\Models\Country;
use App\Models\Idiom;
use App\Models\City;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
// use App\Http\Requests\StoretagRequest;
// use App\Http\Requests\UpdatetagRequest;
use Illuminate\Support\Facades\Storage;

class TagController extends Controller
{

    public function index()
    {
        $tags = Tags::all();

        return view('panel.tags.index', compact('tags'));
    }

    public function create()
    {
      
        return view('panel.tags.create');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255'
        ]);
        try {
             $ptt = DB::table('tags')->where('name',trim(strtolower($validatedData['name'])))->first();
            if(!$ptt){

                $tag = new Tags();
                $tag->name = strtolower($validatedData['name']);
                $tag->save();

                 return redirect()->route('tags.index')->with('success', 'Tag created successfully.');
            }else{
               return redirect()->route('tags.index')->with('error', 'Tag previously created .');
            }
            
        } catch (\Throwable $e) {
            dd($e);
        }

       
    }

    public function storeFront(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255'
        ]);

        try {

           
            $ptt = DB::table('tags')->where('name',trim(strtolower($validatedData['name'])))->first();
         
            if(!$ptt){

            $tag = new Tags();
            $tag->name = strtolower($validatedData['name']);
            $tag->save();

            return response()->json(['code'=>200,"message"=>'Success'], 200);
            }else{
                return response()->json(['code'=>422,"message"=>"Previously created"], 200);
            }

            
            
        } catch (\Exception $e) {
            
            return response()->json(['code'=>500,"message"=>$e], 500);
        }

        
        // return redirect()->route('tags.index')
        //     ->with('success', 'Tag created successfully.');
    }


    public function edit(Tags $tag)
    {
        return view('panel.tags.edit', compact('tag'));
    }


    public function show(Tags $tag)
    {
        return view('panel.tags.show', compact('tag'));
    }

    public function update(Request $request, Tags $tag)
    {
        $validatedData = $request->validate([
            'name' => 'nullable|string|max:255',
        ]);

        try {
            $tag->name = $validatedData['name'];
            $tag->save();

        } catch (\Throwable $e) {
            dd($e);
        }

        return redirect()->route('tags.index')
            ->with('success', 'Tag updated successfully.');
    }


    public function destroy(Tags $tag)
    {
        $tag->delete();

        return redirect()->route('tags.index')
            ->with('success', 'tag deleted successfully.');
    }
}