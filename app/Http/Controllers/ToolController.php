<?php

namespace App\Http\Controllers;

use App\Models\Tool;
use App\Models\Country;
use App\Models\Idiom;
use App\Models\City;
use App\Models\ToolsIdiom;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class ToolController extends Controller
{

    public function index()
    {
        $tools = Tool::with('idioms')->get();


        // verifica si obtienes los datos correctamente
        $countries = Country::all();
        $cities = City::all();
        // $idioms = Idiom::all();

        return view('panel.tools.index', compact('tools', 'cities', 'countries'));
    }

    public function create()
    {
        $countries = Country::all();
        $cities = City::all();
        $idioms = Idiom::all();
        return view('panel.tools.create', compact('countries', 'cities', 'idioms'));
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
            
        

            $tool = new Tool();

            $tool->country_id = isset($request->country_id) == true ? $validatedData['country_id']:null;
            $tool->city_id =    isset($request->city_id) == true ? $validatedData['city_id']:null;
            $tool->user_id = auth()->user()->id;
            $tool->save();

            

            $Last = Tool::with('user')->get()->last();


            foreach($request->idiom_id as $i){
                
                $toolIdiom = new ToolsIdiom();
                $toolIdiom->tool_id = $Last->id;
                $toolIdiom->idiom_id = $i;
                $toolIdiom->title = $datos["title_".$i];
                $toolIdiom->description =$datos["description_".$i];
            if ($request->hasFile("photo_".$i)) {

                // $fileArchivePhoto = $request->file("photo_".$i);
                // $nameArchivePhoto = time() . '.' . $fileArchivePhoto->getClientOriginalExtension();
                // $ruta = \Storage::disk('local')->put('public/tools/'.$nameArchivePhoto,  \File::get($fileArchivePhoto));
                 $path = Storage::disk('s3')->put(env("FILESYSTEM_PATH"), $request->file('photo_'.$i),'public');
                        $path = Storage::disk('s3')->url($path);
                $filePhoto=$path;//'/storage/caballo/'.$nameArchivePhoto;

            }
            if ($request->hasFile("file_".$i)) {
                // $fileName = $request->file("file_".$i)->getClientOriginalName();
                // $pathFile = $request->file("file_".$i)->storeAs('public/tools', $fileName);
                 $path = Storage::disk('s3')->put(env("FILESYSTEM_PATH"), $request->file('file_'.$i),'public');
                        $path = Storage::disk('s3')->url($path);
                $toolIdiom->file = $path;//'storage/tools/' . $fileName;
            }

            
                $toolIdiom->slug = Str::slug($datos["slug_".$i] ?? $datos["title_".$i], '_');
                $toolIdiom->save();
                
            }


           

            
        } catch (\Throwable $e) {
            dd($e);
        }

        return redirect()->route('tools.index')
            ->with('success', 'Tool created successfully.');
    }

    public function edit(Tool $tool)
    {
       $tool=Tool::with('idioms')->find($tool->id);
        $countries = Country::all();
        $cities = City::all();
        $idioms = Idiom::all();

        $idiomsSelect=array();
        $array_data = array();
        foreach($tool->idioms as $i){
            array_push($idiomsSelect,$i->id);

            $id_idiom = $i->id;
            $data=ToolsIdiom::with('idiom')->where('idiom_id',$id_idiom)->where('tool_id',$tool->id)->get();
            array_push($array_data,$data);
        }

        $arrayNot=Idiom::whereNotIn('id',$idiomsSelect)->get();
        

        foreach($arrayNot as $n){

            $obj = new \stdClass();

            $obj->id = null;
            $obj->tool_id= null;
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
        
  
        return view('panel.tools.edit', compact('tool','idiomsSelect','countries', 'cities', 'idioms','array_data',));
    }

    public function show(Tool $tool)
    {
      $tool=Tool::with('idioms')->find($tool->id);

        $array_data = array();
        
      
        foreach($tool->idioms as $i){
            
            $id_idiom = $i->id;

           $data=ToolsIdiom::with('idiom')->where('idiom_id',$id_idiom)->where('tool_id',$tool->id)->get();

         

           array_push($array_data,$data);
            
        }
      
        $countries = Country::all();
        $cities = City::all();
        $idioms = Idiom::all();
       
        return view('panel.tools.show', compact('tool', 'countries', 'cities','array_data','idioms'));
    }

    public function update(Request $request, Tool $tool)
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
    
                $tool->country_id = isset($request->country_id) == true ? $validatedData['country_id']:null;
                $tool->city_id =    isset($request->city_id) == true ? $validatedData['city_id']:null;
                $tool->user_id = auth()->user()->id;

                  if ($request->hasFile("photo")) {
    
                    // $fileName = time() . '.' .$request->file('photo')->getClientOriginalName();
                    // $path = $request->file('photo')->storeAs('public/tools', $fileName);
                     $path = Storage::disk('s3')->put(env("FILESYSTEM_PATH"), $request->file('photo'),'public');
                        $path = Storage::disk('s3')->url($path);
                    $tool->photo = $path;//'storage/tools/' . $fileName;
    
                }
                $tool->save();

              

        
                $toolIdiom=ToolsIdiom::where('tool_id',$tool->id)->get();
                foreach($toolIdiom as $d){
                    $d->delete();
                }
            
                foreach($request->idiom_id as $i){
                    
                    $toolIdiom = new ToolsIdiom();
                    $toolIdiom->tool_id = $tool->id;
                    $toolIdiom->idiom_id = $i;
                    $toolIdiom->title = $datos["title_".$i];
                    $toolIdiom->description =$datos["description_".$i];
               
              
    
                
                    $toolIdiom->slug = Str::slug($datos["slug_".$i] ?? $datos["title_".$i], '_');
                    $toolIdiom->save();
                    
                }

        } catch (\Throwable $e) {
                dd($e);
        }

        return redirect()->route('tools.index')
            ->with('success', 'Tool updated successfully.');
    }


    public function destroy(Tool $tool)
    {
       $find=ToolsIdiom::where('tool_id',$tool->id)->get();

        if(isset($find))
        {
            foreach($find as $f){
                $f->delete();
            }
        }
        $tool->delete();

        return redirect()->route('tools.index')
            ->with('success', 'Tool deleted successfully.');
    }
}
