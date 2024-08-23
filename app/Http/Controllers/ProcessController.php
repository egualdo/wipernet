<?php

namespace App\Http\Controllers;

use App\Models\Process;
use App\Models\ProcessesIdiom;
use App\Models\Country;
use App\Models\Idiom;
use App\Models\City;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class ProcessController extends Controller
{

    public function index()
    {
        $processes = Process::with('idioms')->get();
        $countries = Country::all();
        $cities = City::all();

        return view('panel.processes.index', compact('processes','cities', 'countries'));
    }
    public function create()
    {
        $countries = Country::all();
        $cities = City::all();
        $idioms = Idiom::all();
        return view('panel.processes.create', compact('countries', 'cities', 'idioms'));
    }
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'country_id' => 'nullable|array',
            'country_id.*' => 'exists:countries,id',
            'city_id' => 'nullable|array',
            'city_id.*' => 'exists:cities,id',
            'idiom_id' => 'nullable|array',
            'idiom_id.*' => 'exists:idioms,id',
        ]);
        try {

            $datos=$request->all();
            $process = new Process();
            $process->country_id = isset($request->country_id) == true ? $validatedData['country_id']:null;
            $process->city_id =    isset($request->city_id) == true ? $validatedData['city_id']:null;
            $process->user_id = auth()->user()->id;
            $process->save();

            $processLast = Process::with('user')->get()->last();


            foreach($request->idiom_id as $i){
                $processIdiom = new ProcessesIdiom();
                $processIdiom->process_id = $processLast->id;
                $processIdiom->idiom_id = $i;
                $processIdiom->title = $datos["title_".$i];
                $processIdiom->description =$datos["description_".$i];
                $processIdiom->slug = Str::slug($datos["slug_".$i] ?? $datos["title_".$i], '_');
                $processIdiom->save();
            }
            
            
        } catch (\Throwable $e) {
            dd($e);
        }

        return redirect()->route('processes.index')
            ->with('success', 'Process created successfully.');
    }

    public function edit(Process $process)
    {

        $process=Process::with('idioms')->find($process->id);
        $countries = Country::all();
        $cities = City::all();
        $idioms = Idiom::all();

        $idiomsSelect=array();
        $array_data = array();
        foreach($process->idioms as $i){
            array_push($idiomsSelect,$i->id);

            $id_idiom = $i->id;
            $data=ProcessesIdiom::with('idiom')->where('idiom_id',$id_idiom)->where('process_id',$process->id)->get();
            array_push($array_data,$data);
        }

        $arrayNot=Idiom::whereNotIn('id',$idiomsSelect)->get();
        

        foreach($arrayNot as $n){

            $obj = new \stdClass();

            $obj->id = null;
            $obj->process_id= null;
            $obj->idiom_id= $n->id;
            $obj->title=null;
            $obj->description=null;
            $obj->slug=null;
            $obj->created_at=null;
            $obj->updated_at=null;
            $obj->idiom=$n;

            array_push($array_data,[$obj]);
            
        }
        
        return view('panel.processes.edit', compact('process','idiomsSelect' ,'countries', 'cities', 'idioms','array_data'));

    }
    public function show(Process $process)
    {
        
        $process=Process::with('idioms')->find($process->id);

        $array_data = array();
        
      
        foreach($process->idioms as $i){
            
            $id_idiom = $i->id;

           $data=ProcessesIdiom::with('idiom')->where('idiom_id',$id_idiom)->where('process_id',$process->id)->get();

         

           array_push($array_data,$data);
            
        }
      
        $countries = Country::all();
        $cities = City::all();

        return view('panel.processes.show', compact('process', 'countries', 'cities','array_data'));
    }

    public function update(Request $request, Process $process)
    {
        $validatedData = $request->validate([
            'country_id' => 'nullable|array',
            'country_id.*' => 'exists:countries,id',
            'city_id' => 'nullable|array',
            'city_id.*' => 'exists:cities,id',
            'idiom_id' => 'nullable|array',
            'idiom_id.*' => 'exists:idioms,id',
        ]);

        try {
            $datos=$request->all();
    
            $process->country_id = isset($request->country_id) == true ? $validatedData['country_id']:null;
            $process->city_id =    isset($request->city_id) == true ? $validatedData['city_id']:null;
            $process->user_id = auth()->user()->id;
            $process->save();
    
            $processIdiom=ProcessesIdiom::where('process_id',$process->id)->get();
            foreach($processIdiom as $d){
                $d->delete();
            }
        
            foreach($request->idiom_id as $i){
                
                $processIdiom = new ProcessesIdiom();
                $processIdiom->process_id = $process->id;
                $processIdiom->idiom_id = $i;
                $processIdiom->title = $datos["title_".$i];
                $processIdiom->description =$datos["description_".$i];
                $processIdiom->slug = Str::slug($datos["slug_".$i] ?? $datos["title_".$i], '_');
                $processIdiom->save();
                
            }
        } catch (\Throwable $e) {
            dd($e);
        }

        return redirect()->route('processes.index')
            ->with('success', 'Process updated successfully.');
    }

    public function destroy(Process $process)
    {
        $findProcess=ProcessesIdiom::where('process_id',$process->id)->get();

        if(isset($findProcess))
        {
            foreach($findProcess as $f){
                $f->delete();
            }
        }
        $process->delete();

        return redirect()->route('processes.index')
            ->with('success', 'Process deleted successfully.');
    }
}