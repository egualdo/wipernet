<?php

namespace App\Http\Controllers;

use App\Models\DataResearch;
use App\Models\DataResearchIdiom;
use App\Models\Country;
use App\Models\Idiom;
use App\Models\City;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class DataResearchController extends Controller
{
    public function index()
    {
        $dataResearchs = DataResearch::with('idioms')->get();
        //return[$dataResearchs];

        // verifica si obtienes los datos correctamente
        $countries = Country::all();
        $cities = City::all();
       // $idioms = Idiom::all();

        return view('panel.dataResearchs.index', compact('dataResearchs', 'cities', 'countries'));
    }

    public function create()
    {
        $countries = Country::all();
        $cities = City::all();
        $idioms = Idiom::all();
        return view('panel.dataResearchs.create', compact('countries', 'cities', 'idioms'));
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
            
        

            $dataResearch = new DataResearch();

            $dataResearch->country_id = isset($request->country_id) == true ? $validatedData['country_id']:null;
            $dataResearch->city_id =    isset($request->city_id) == true ? $validatedData['city_id']:null;
            $dataResearch->user_id = auth()->user()->id;
            $dataResearch->save();

            

            $dataResearchLast = DataResearch::with('user')->get()->last();


            foreach($request->idiom_id as $i){
                
                $dataResearchIdiom = new DataResearchIdiom();
                $dataResearchIdiom->data_research_id = $dataResearchLast->id;
                $dataResearchIdiom->idiom_id = $i;
                $dataResearchIdiom->title = $datos["title_".$i];
                $dataResearchIdiom->description =$datos["description_".$i];
            if ($request->hasFile("photo_".$i)) {

                //  $fileName = $request->file('photo_'.$i)->getClientOriginalName();
                // $path = $request->file('photo_'.$i)->storeAs('public/dataResearchs', $fileName);
                 $path = Storage::disk('s3')->put(env("FILESYSTEM_PATH"), $request->file('photo_'.$i),'public');
                        $path = Storage::disk('s3')->url($path);
                $dataResearchIdiom->photo = $path;//'storage/dataResearchs/' . $fileName;
                // $fileArchivePhoto = $request->file("photo_".$i);
                // $nameArchivePhoto = time() . '.' . $fileArchivePhoto->getClientOriginalExtension();
                // $ruta = \Storage::disk('local')->put('public/dataResearchs/'.$nameArchivePhoto,  \File::get($fileArchivePhoto));
                // $filePhoto='/storage/caballo/'.$nameArchivePhoto;

            }

            if ($request->hasFile("file_".$i)) {
                // $fileName = $request->file("file_".$i)->getClientOriginalName();
                // $pathFile = $request->file("file_".$i)->storeAs('public/dataResearchs', $fileName);
                 $path = Storage::disk('s3')->put(env("FILESYSTEM_PATH"), $request->file('file_'.$i),'public');
                        $path = Storage::disk('s3')->url($path);
                $dataResearchIdiom->file = $path;//'storage/dataResearchs/' . $fileName;
            }

            
                $dataResearchIdiom->slug = $datos["slug_".$i];//Str::slug($datos["slug_".$i] ?? $datos["title_".$i], '_');
                $dataResearchIdiom->save();
                
            }


           

            
        } catch (\Throwable $e) {
            dd($e);
        }

        return redirect()->route('dataResearchs.index')
            ->with('success', 'DataResearch created successfully.');
    }

    public function edit(DataResearch $dataResearch)
    {
        $dataResearch=DataResearch::with('idioms')->find($dataResearch->id);
        $countries = Country::all();
        $cities = City::all();
        $idioms = Idiom::all();

        $idiomsSelect=array();
        $array_data = array();
        foreach($dataResearch->idioms as $i){
            array_push($idiomsSelect,$i->id);

            $id_idiom = $i->id;
            $data=DataResearchIdiom::with('idiom')->where('idiom_id',$id_idiom)->where('data_research_id',$dataResearch->id)->get();
            array_push($array_data,$data);
        }

        $arrayNot=Idiom::whereNotIn('id',$idiomsSelect)->get();
        

        foreach($arrayNot as $n){

            $obj = new \stdClass();

            $obj->id = null;
            $obj->data_research_id= null;
            $obj->idiom_id= $n->id;
            $obj->title=null;
            $obj->description=null;
            $obj->photo=null;
            $obj->file=null;
            $obj->slug=null;
            $obj->created_at=null;
            $obj->updated_at=null;
            $obj->idiom=$n;

            array_push($array_data,[$obj]);
            
        }
        
  
        
        return view('panel.dataResearchs.edit', compact('dataResearch','idiomsSelect' ,'countries', 'cities', 'idioms','array_data'));
    }

    public function show(DataResearch $dataResearch)
    {
       

        $dataResearch=DataResearch::with('idioms')->find($dataResearch->id);

        $array_data = array();
        
      
        foreach($dataResearch->idioms as $i){
            
            $id_idiom = $i->id;

           $data=DataResearchIdiom::with('idiom')->where('idiom_id',$id_idiom)->where('data_research_id',$dataResearch->id)->get();

         

           array_push($array_data,$data);
            
        }
      
        $countries = Country::all();
        $cities = City::all();
        //$idioms = Idiom::all();
       

    
        return view('panel.dataResearchs.show', compact('dataResearch', 'countries', 'cities','array_data'));
    }

    public function update(Request $request, DataResearch $dataResearch)
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
    
                $dataResearch->country_id = isset($request->country_id) == true ? $validatedData['country_id']:null;
                $dataResearch->city_id =    isset($request->city_id) == true ? $validatedData['city_id']:null;
                $dataResearch->user_id = auth()->user()->id;
                $dataResearch->save();

                $dataResearchIdiom=DataResearchIdiom::where('data_research_id',$dataResearch->id)->get();
                //trae 2 resultados varian en el idioma
               $photos=[];
               $files=[];

               
                    foreach($request->idiom_id as $i){
                           
                            $obj = new \stdClass();
                            $obj2 = new \stdClass();
                            $d=DataResearchIdiom::  where('data_research_id',$dataResearch->id)->
                                                    where('idiom_id',$i)->
                                                    first();
                                                    //el 3er idioma no se encuentra en la pivote
                            if ($d !== null) {
                                if($request->hasFile("photo_".$i)) {
                                            // $stringg= str_replace('storage/','public/', $d->photo);
                                            if ($d->photo !== null && $d->photo !== '' ) {
                                                if(Storage::exists($d->photo)){
                                                    Storage::disk('s3')->delete($d->photo);
                                                }
                                            }
                                }else{
                                    $obj->id = $i;
                                    $obj->photo= $d->photo;
                                    array_push($photos,$obj);
                                    
                                }

                                if ($request->hasFile("file_".$i)) {
                                            // Eliminar el archivo anterior
                                            // $stringgg= str_replace('storage/','public/', $d->file);

                                            if ($d->file !== null && $d->file !== '') {
                                                if(Storage::exists($d->file)){
                                                    Storage::disk('s3')->delete($d->file);
                                                
                                                }
                                            }
                                }else{
                                    $obj2->id = $i;
                                    $obj2->file= $d->file;
                                    array_push($files,$obj2);
                                   
                                }

                                $d->delete();
                            }
                    }

                    // dd($photos,$files);
            
                foreach($request->idiom_id as $j){//se crean los nuevos registros en la pivote
                         

                            $dataResearchIdiom = new DataResearchIdiom();
                            $dataResearchIdiom->data_research_id = $dataResearch->id;
                            $dataResearchIdiom->idiom_id = $j;
                            $dataResearchIdiom->title = $datos["title_".$j];
                            $dataResearchIdiom->description =$datos["description_".$j];

                            // Guardar la nueva imagen
                            if ($request->hasFile("photo_".$j)) {
                                // dd('si trae foto nueva para registrar');
                                // $fileName = $request->file('photo_'.$j)->getClientOriginalName();
                                // $path = $request->file('photo_'.$j)->storeAs('public/dataResearchs', $fileName);
                                $path = Storage::disk('s3')->put(env("FILESYSTEM_PATH"), $request->file('photo_'.$j),'public');
                                $path = Storage::disk('s3')->url($path);
                                $dataResearchIdiom->photo = $path;//'storage/dataResearchs/' . $fileName;
                            }else{
                                foreach ($photos as $value) {
                                    if($value->id == $j)
                                        $dataResearchIdiom->photo = $value->photo;
                                        
                                }
                                
                            }
                        
                            if ($request->hasFile("file_".$j)) {
                                // $fileName = $request->file("file_".$j)->getClientOriginalName();
                                // $pathFile = $request->file("file_".$j)->storeAs('public/dataResearchs', $fileName);
                                $path = Storage::disk('s3')->put(env("FILESYSTEM_PATH"), $request->file('file_'.$j),'public');
                                $path = Storage::disk('s3')->url($path);
                                $dataResearchIdiom->file = $path;//'storage/dataResearchs/' . $fileName;
                            }else{
                                foreach ($files as  $value) {
                                    if($value->id == $j)
                                        $dataResearchIdiom->file = $value->file;
                                }
                            }
                
                                $dataResearchIdiom->slug = $datos["slug_".$j];//Str::slug($datos["slug_".$j] ?? $datos["title_".$j], '_');
                                $dataResearchIdiom->save();
                }

        } catch (\Throwable $e) {
                dd($e);
        }
            
        return redirect()->route('dataResearchs.index')
            ->with('success', 'DataResearch updated successfully.');
    }

    public function destroy(DataResearch $dataResearch)
    {
        $findDatasearch=DataResearchIdiom::where('data_research_id',$dataResearch->id)->get();

        if(isset($findDatasearch))
        {
            foreach($findDatasearch as $f){
                if(Storage::exists($f->file)){
                    Storage::disk('s3')->delete($f->file);
                }
                if(Storage::exists($f->photo)){
                    Storage::disk('s3')->delete($f->photo);
                }

                $f->delete();
            }
        }
        $dataResearch->delete();

        return redirect()->route('dataResearchs.index')
            ->with('success', 'DataResearch deleted successfully.');
    }

}