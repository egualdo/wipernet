<?php

namespace App\Http\Controllers;

use App\Models\City;
use App\Models\Header;
use App\Models\HeaderIdiom;
use App\Models\Country;
use App\Models\Idiom;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Symfony\Component\Console\Input\Input;

class HeaderController extends Controller
{
    public function index()
    {
        $headers = Header::with(['idioms'])->get();
        $countries = Country::all();
        $cities = City::all();
        
        return view('panel.header.index', compact('headers', 'cities', 'countries'));
    }

    public function create()
    {
        $countries = Country::all();
        $cities = City::all();
        $idioms = Idiom::all();
        return view('panel.header.create', compact('countries', 'cities', 'idioms'));
    }

    public function store(Request $request)
    {
        // dd($request->all());
        $validatedData = $request->validate([
            'country_id' => 'nullable|array',
            'country_id.*' => 'exists:countries,id',
            'city_id' => 'nullable|array',
            'city_id.*' => 'exists:cities,id',
            'idiom_id'=>'required'
            // 'photo' => 'exists:idioms,id',
        ]);

        // if($validatedData->fails()) {
        //     return redirect()->back()->withErrors($validatedData);
        // }

        DB::beginTransaction();
        try {
       
            $datos=$request->all();

            $header = new Header();
            $header->country_id = isset($request->country_id) == true ? $validatedData['country_id']:null;
            $header->city_id =    isset($request->city_id) == true ? $validatedData['city_id']:null;
            
            
            $header->save();

            $headerLast = Header::get()->last();

            foreach($request->idiom_id as $i){
                
                    $headerIdiom = new HeaderIdiom();
                    $headerIdiom->header_id = $headerLast->id;
                    $headerIdiom->idiom_id = $i;
                    $headerIdiom->title = $datos["title_".$i];
                    $headerIdiom->subtitle = $datos["subtitle_".$i];
                    $headerIdiom->link = $datos["link_".$i];

                    if ($request->hasFile("photo_".$i)) {

                        $path = Storage::disk('s3')->put(env("FILESYSTEM_PATH"), $request->file('photo_'.$i),'public');
                        $path = Storage::disk('s3')->url($path);
                        $headerIdiom->image = $path;
                      
                    }else{
                        if($headerLast->image!=null){

                            $headerIdiom->image=$headerLast->image; 
                        }else{
                             DB::rollback();
                            return redirect()->back()->withErrors('Los campos no deben estar vacios')->withInput();
                        }
                    }
                    // dd($headerIdiom);
                    $headerIdiom->save();
                     DB::commit();
            }

        } catch (\Throwable $e) {
                  DB::rollback();
           return redirect()->back()->withErrors($e->getMessage());
        }

        return redirect()->route('header.index')
            ->with('success', 'Header created successfully.');
    }

    public function edit($header)
    {
        $header=Header::with('idioms')->find($header);
        $countries = Country::all();
        $cities = City::all();
        $idioms = Idiom::all();

        $idiomsSelect=array();
        $array_data = array();
        foreach($header->idioms as $i){
            array_push($idiomsSelect,$i->id);
            $id_idiom = $i->id;
            $data=HeaderIdiom::with('idiom')->where('idiom_id',$id_idiom)->where('header_id',$header->id)->get();
            array_push($array_data,$data);
        }

        $arrayNot=Idiom::whereNotIn('id',$idiomsSelect)->get();

        foreach($arrayNot as $n){

            $obj = new \stdClass();
            $obj->id = null;
            $obj->header_id= null;
            $obj->idiom_id= $n->id;
            $obj->title=null;
            $obj->image=null;
            $obj->subtitle=null;
            $obj->created_at=null;
            $obj->updated_at=null;
            $obj->idiom=$n;

            array_push($array_data,[$obj]);
        }
        return view('panel.header.edit', compact('header', 'countries', 'cities', 'idioms','array_data','idiomsSelect'));
    }

    public function show($header)
    {
        $header=Header::with('idioms')->find($header);
    
        $array_data = array();
      
        foreach($header->idioms as $i){
            $id_idiom = $i->id;
           $data=HeaderIdiom::with('idiom')->where('idiom_id',$id_idiom)->where('header_id',$header->id)->get();
           array_push($array_data,$data);
        }
      
        $countries = Country::all();
        $cities = City::all();

        return view('panel.header.show',          compact('header', 'countries', 'cities', 'array_data'));
    }

    public function update(Request $request, $header)
    {
        
        $validatedData = $request->validate([
            'country_id' => 'nullable|array',
            'country_id.*' => 'exists:countries,id',
            'city_id' => 'nullable|array',
            'city_id.*' => 'exists:cities,id'
            // 'idiom_id' => 'nullable|array',
            // 'idiom_id.*' => 'exists:idioms,id',
        ]);

         
              DB::beginTransaction();
        try {
                $datos=$request->all();
                $header=Header::find($header);
                $header->country_id = isset($request->country_id) == true ? $validatedData['country_id']:null;
                $header->city_id =    isset($request->city_id) == true ? $validatedData['city_id']:null;
                $header->save();
               
                $headerIdiom=HeaderIdiom::where('header_id',$header->id)->get();
                $photos=[];

                 foreach($request->idiom_id as $i){
                            $obj = new \stdClass();

                            $d=HeaderIdiom::where('header_id',$header->id)->
                                            where('idiom_id',$i)->
                                            first();
                                                    
                            if ($d !== null) {
                                if($request->hasFile("photo_".$i)) {
                                    if ($d->image) {
                                        if(Storage::exists($d->image)){
                                            Storage::disk('s3')->delete($d->image);
                                        }
                                    }
                                }else{
                                    $obj->id = $i;
                                    $obj->image= $d->image;
                                    array_push($photos,$obj);
                                }

                                $d->delete();
                            }
                    }

            
                foreach($request->idiom_id as $i){
                    
                    $headerIdiom = new HeaderIdiom();
                    $headerIdiom->header_id = $header->id;
                    $headerIdiom->idiom_id = $i;
                    $headerIdiom->title = $datos["title_".$i];
                    $headerIdiom->subtitle = $datos["subtitle_".$i];
                    $headerIdiom->link = $datos["link_".$i];

                    if ($request->hasFile('photo_'.$i)) {
               
                        if ($header->image) {
                            if(Storage::exists($header->image)){
                                Storage::disk('s3')->delete($header->image);
                            }
                        }
                        $path = Storage::disk('s3')->put(env("FILESYSTEM_PATH"), $request->file('photo_'.$i),'public');
                        $path = Storage::disk('s3')->url($path);
                        $headerIdiom->image = $path;
                    }else{
                    
                        foreach ($photos as $value) {
                            if($value->id == $i)
                                $headerIdiom->image = $value->image;
                        }    
                    }
                        // dd($headerIdiom);
                    $headerIdiom->save();
                    DB::commit();
                } 
               
            } catch (\Throwable $e) {
                  DB::rollback();
                return redirect()->back()->withErrors($e->getMessage());
            }

      

        return redirect()->route('header.index')
            ->with('success', 'Header updated successfully.');
    }

    public function destroy($header)
    {
       $find=HeaderIdiom::where('header_id',$header)->get();
       $findheader=Header::find($header);

        if(isset($find))
        {
            foreach($find as $f){
                $f->delete();
            }
        }
        $findheader->delete();

        return redirect()->route('header.index')
            ->with('success', 'Header deleted successfully.');
    }
}

