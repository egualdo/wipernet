<?php

namespace App\Http\Controllers;

use App\Models\Direction;
use App\Models\DirectionsIdiom;
use App\Models\Country;
use App\Models\Idiom;
use App\Models\City;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class DirectionController extends Controller
{

    public function index()
    {
        $directions = Direction::with('idioms')->get();

        $countries = Country::all();
        $cities = City::all();
        return view('panel.directions.index', compact('directions', 'countries', 'cities'));
    }

    public function create()
    {
        $countries = Country::all();
        $cities = City::all();
        $idioms = Idiom::all();
        return view('panel.directions.create', compact('countries', 'cities', 'idioms'));
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'acronym' => 'nullable|string|max:255',
            'country_id' => 'nullable|array',
            'country_id.*' => 'exists:countries,id',
            'city_id' => 'nullable|array',
            'city_id.*' => 'exists:cities,id',
            'idiom_id' => 'nullable|array',
            'idiom_id.*' => 'exists:idioms,id',
            'subtitle' => 'nullable|string|max:255',
        ]);
        try {

            $datos=$request->all();

            $direction = new Direction();
            $direction->acronym = $validatedData['acronym'];
            $direction->subtitle = $validatedData['subtitle'];
            $direction->country_id = isset($request->country_id) == true ? $validatedData['country_id']:null;
            $direction->city_id =    isset($request->city_id) == true ? $validatedData['city_id']:null;
            $direction->user_id = auth()->user()->id;
            $direction->save();
            

            $directionLast = Direction::with('user')->get()->last();


            foreach($request->idiom_id as $i){
                
                $directionIdiom = new DirectionsIdiom();
                $directionIdiom->direction_id = $directionLast->id;
                $directionIdiom->idiom_id = $i;
                $directionIdiom->direction =$datos["direction_".$i];
                $directionIdiom->slug = Str::slug($datos["slug_".$i] ?? $datos["direction_".$i], '_');
                $directionIdiom->save();
                
            }

        } catch (\Throwable $e) {
            dd($e);
        }

        return redirect()->route('directions.index')
            ->with('success', 'Direction created successfully.');
    }

    public function edit(Direction $direction)
    {

        $direction=Direction::with('idioms')->find($direction->id);
        $countries = Country::all();
        $cities = City::all();
        $idioms = Idiom::all();

        $idiomsSelect=array();
        $array_data = array();
        foreach($direction->idioms as $i){
            array_push($idiomsSelect,$i->id);

            $id_idiom = $i->id;
            $data=DirectionsIdiom::with('idiom')->where('idiom_id',$id_idiom)->where('direction_id',$direction->id)->get();
            array_push($array_data,$data);
        }

        $arrayNot=Idiom::whereNotIn('id',$idiomsSelect)->get();
        

        foreach($arrayNot as $n){

            $obj = new \stdClass();

            $obj->id = null;
            $obj->direction_id= null;
            $obj->idiom_id= $n->id;
            $obj->direction=null;
            $obj->slug=null;
            $obj->created_at=null;
            $obj->updated_at=null;
            $obj->idiom=$n;

            array_push($array_data,[$obj]);
            
        }
    
        return view('panel.directions.edit', compact('direction', 'idiomsSelect' ,'countries', 'cities', 'idioms','array_data'));
    }

    public function show(Direction $direction)
    {
        $direction=Direction::with('idioms')->find($direction->id);

        $array_data = array();
        foreach($direction->idioms as $i){
            
            $id_idiom = $i->id;

           $data=DirectionsIdiom::with('idiom')->where('idiom_id',$id_idiom)->where('direction_id',$direction->id)->get();

           array_push($array_data,$data);
            
        }
      
        $countries = Country::all();
        $cities = City::all();
    
        return view('panel.directions.show', compact('direction', 'countries', 'cities','array_data'));
    }

    public function update(Request $request, Direction $direction)
    {
        $validatedData = $request->validate([
            'acronym' => 'nullable|string|max:255',
            'country_id' => 'nullable|array',
            'country_id.*' => 'exists:countries,id',
            'city_id' => 'nullable|array',
            'city_id.*' => 'exists:cities,id',
            'idiom_id' => 'nullable|array',
            'idiom_id.*' => 'exists:idioms,id',
            'subtitle' => 'nullable|string|max:255',
        ]);

        try {
            $datos=$request->all();
            
            $direction->acronym = $validatedData['acronym'];
            $direction->subtitle = $validatedData['subtitle'];
            $direction->country_id = isset($request->country_id) == true ? $validatedData['country_id']:null;
            $direction->city_id =    isset($request->city_id) == true ? $validatedData['city_id']:null;
            $direction->user_id = auth()->user()->id;
            $direction->save();

            $directionIdiom=DirectionsIdiom::where('direction_id',$direction->id)->get();
            foreach($directionIdiom as $d){
                $d->delete();
            }
        
            foreach($request->idiom_id as $i){
                
                $directionIdiom = new DirectionsIdiom();
                $directionIdiom->direction_id = $direction->id;
                $directionIdiom->idiom_id = $i;
                $directionIdiom->direction =$datos["direction_".$i];            
                $directionIdiom->slug = Str::slug($datos["slug_".$i] ?? $datos["direction_".$i], '_');
                $directionIdiom->save();
                
            }
        } catch (\Throwable $e) {
            dd($e);
        }

        return redirect()->route('directions.index')
            ->with('success', 'Direction updated successfully.');
    }

    public function destroy(Direction $direction)
    {

        $findDirection=DirectionsIdiom::where('direction_id',$direction->id)->get();

        if(isset($findDirection))
        {
            foreach($findDirection as $d){
                $d->delete();
            }
        }
        $direction->delete();

        return redirect()->route('directions.index')
            ->with('success', 'Direction deleted successfully.');
    }
}