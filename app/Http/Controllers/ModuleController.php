<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\City;
use App\Models\Module;
use App\Models\ModuleIdiom;
use App\Models\Country;
use App\Models\Idiom;
use App\Models\ModuleType;
use App\Models\ProjectType;
use App\Models\ProjectTypesIdiom;
use App\Models\Service;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class ModuleController extends Controller
{
        public function index()
    {
        $modules = Module::with(['idioms'])->get();
        $countries = Country::all();
        $cities = City::all();
        
        return view('panel.modules.index', compact('modules', 'cities', 'countries'));
    }

    public function create()
    {
        $countries = Country::all();
        $cities = City::all();
        $idioms = Idiom::all();
        $projectTypes= ProjectType::all();
        $moduleTypes= ModuleType::all();
        $services=Service::all();
        return view('panel.modules.create', compact('countries', 'cities', 'idioms','projectTypes','moduleTypes','services'));
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
            'name'=>'required',
            // 'project_type_id'=>'required',
            // 'service_id'=>'numeric',
            'module_type_id'=>'required',
        ]);
        
        try {
       
            $module = new Module();
            $module->country_id = isset($request->country_id) == true ? $validatedData['country_id']:null;
            $module->city_id =    isset($request->city_id) == true ? $validatedData['city_id']:null;
            $module->name = ($validatedData['name']);
            $module->project_type_id = $request->project_type_id == '' ? null:$request->project_type_id;
            $module->service_id = $request->service_id == '' ? null:$request->service_id;
            $module->module_type_id = ($validatedData['module_type_id']);
            $module->json_data = '{}';
            $module->save();

            $moduleLast = Module::get()->last();


            foreach($request->idiom_id as $i){
                    
                    $image='';//http://wiper-site-2023-admin.test/storage/modules/1689197081pxfuel (1).jpg
                    $video='';
                    $file='';
                    // $urlbase=env('APP_URL');

                    if ($request->hasFile('image_'.$i)) {
                                 
                                    $path = Storage::disk('s3')->put(env("FILESYSTEM_PATH"), $request->file('image_'.$i),'public');
                                    $path = Storage::disk('s3')->url($path);
                                    $image = $path;
                                    // $this->storeImage(  $request->file('image_'.$i), env("FILESYSTEM_PATH") );
                        // $fileName = time().$request->file('image_'.$i)->getClientOriginalName();
                        // $path = $request->file('image_'.$i)->storeAs('public/modules', $fileName);
                        //$image = $urlbase.'storage/modules/' . $fileName;
                    }

                    if ($request->hasFile('video_'.$i)) {
                         
                                    $path = Storage::disk('s3')->put(env("FILESYSTEM_PATH"), $request->file('video_'.$i),'public');
                                    $path = Storage::disk('s3')->url($path);
                                    $video = $path;
                        // $fileName = time().$request->file('video_'.$i)->getClientOriginalName();
                        // $path = $request->file('video_'.$i)->storeAs('public/modules', $fileName);
                        // $video = $urlbase.'storage/modules/' . $fileName;
                    }else{
                        $video=$request['video_'.$i];
                    }

                    if ($request->hasFile('file_'.$i)) {  
                                
                        $path = Storage::disk('s3')->put(env("FILESYSTEM_PATH"), $request->file('file_'.$i),'public');
                        $path = Storage::disk('s3')->url($path);
                        $file = $path;

                        // $fileName = time().$request->file('file_'.$i)->getClientOriginalName();
                        // $path = $request->file('file_'.$i)->storeAs('public/modules', $fileName);
                        // $file = $urlbase.'storage/modules/' . $fileName;
                    }

                    $module_type=ModuleType::find($request->module_type_id);
                    $replaced1=$module_type->html;
                    
                    if($request['title_'.$i] !== null && $request['title_'.$i] !== ''){
                        $replaced1=str_replace('titulo',$request['title_'.$i],$replaced1);
                    }
                    
                    if($request['subtitle_'.$i] !== null && $request['subtitle_'.$i] !== ''){
                        $replaced1=str_replace('descripcion',$request['subtitle_'.$i],$replaced1);
                    }

                    if($request['text_'.$i] !== null && $request['text_'.$i] !== ''){
                        $replaced1=str_replace('texto',$request['text_'.$i],$replaced1);
                    }

                    if($request['link_'.$i] !== null && $request['link_'.$i] !== ''){
                        $replaced1=str_replace('link',$request['link_'.$i],$replaced1);
                    }
                    
                    if($video !== null && $video !== '' ){
                        $replaced1=str_replace('videos',$video,$replaced1);
                    }

                    if($image !== null && $image !== ''){
                        $replaced1=str_replace('imagen',$image,$replaced1);
                    }

                    if ($file !== null && $file !== '') {
                        $replaced1=str_replace('archivo',$file,$replaced1);
                    }

                    
                    $moduleIdiom = new ModuleIdiom();
                    $moduleIdiom->module_id = $moduleLast->id;
                    $moduleIdiom->idiom_id = $i;
                    $moduleIdiom->html = $replaced1;
                    $moduleIdiom->module_type_id = $module_type->id;
                    $moduleIdiom->save();
            }

        } catch (\Throwable $e) {

            // dd($e);
              return redirect()->back()
            ->withErrors('error', $e->getMessage());
        }

        return redirect()->route('modules.index')
            ->with('success', 'Module created successfully.');
    }

    public function edit($module)
    {
        $module=Module::with('idioms')->find($module);
        $countries = Country::all();
        $cities = City::all();
        $idioms = Idiom::all();

        $idiomsSelect=array();
        $array_data = array();
        foreach($module->idioms as $i){
            array_push($idiomsSelect,$i->id);
            $id_idiom = $i->id;
            $data=ModuleIdiom::with('idiom')->where('idiom_id',$id_idiom)->where('module_id',$module->id)->get();
            array_push($array_data,$data);
        }

        $arrayNot=Idiom::whereNotIn('id',$idiomsSelect)->get();

        foreach($arrayNot as $n){

            $obj = new \stdClass();
            $obj->id = null;
            $obj->module_id= null;
            $obj->idiom_id= $n->id;
            $obj->created_at=null;
            $obj->updated_at=null;
            $obj->idiom=$n;

            array_push($array_data,[$obj]);
        }
        // dd($array_data);
        return view('panel.modules.edit', compact('module', 'countries', 'cities', 'idioms','array_data','idiomsSelect'));
    }

    public function show($module)
    {
        $module=Module::with('idioms')->find($module);
    
        $array_data = array();
      
        foreach($module->idioms as $i){
            $id_idiom = $i->id;
           $data=ModuleIdiom::with('idiom')->where('idiom_id',$id_idiom)->where('module_id',$module->id)->get();
           array_push($array_data,$data);
        }
      
        $countries = Country::all();
        $cities = City::all();

        return view('panel.modules.show',          compact('module', 'countries', 'cities', 'array_data'));
    }

    public function update(Request $request,Module $module)
    {
                // dd($request->all());
        $validatedData = $request->validate([
            'country_id' => 'nullable|array',
            'country_id.*' => 'exists:countries,id',
            'city_id' => 'nullable|array',
            'city_id.*' => 'exists:cities,id',
            'idiom_id' => 'nullable|array',
            'idiom_id.*' => 'exists:idioms,id'
        ]);

        try {   
                
                $datos=$request->all();

                $module->country_id = isset($request->country_id) == true ? $validatedData['country_id']:null;
                $module->city_id =    isset($request->city_id) == true ? $validatedData['city_id']:null;
                $module->name = $request->name;
                $module->order = $request->order;
                if($request->filled('project_type_id')){
                    $module->project_type_id = $request->project_type_id;
                }

                if($request->filled('service_id')){
                    $module->service_id = $request->service_id;
                }
                    
                if($request->filled('module_type_id')){
                    $module->module_type_id = $request->module_type_id;
                }
                // $module->macro_html = $request->macro_html;
                // dd($module);
                $module->save();

               
                $moduleIdiom=ModuleIdiom::where('module_id',$module->id)->get();
                foreach($moduleIdiom as $d){
                    $d->delete();
                }
            
                foreach($request->idiom_id as $i){
                    
                    $moduleIdiom = new ModuleIdiom();
                    $moduleIdiom->module_id = $module->id;
                    $moduleIdiom->idiom_id = $i;
                    $moduleIdiom->html = $html;
                    $moduleIdiom->save();
                    
                } 
               
            } catch (\Exception $e) {
                dd($e);
            }

      

        return redirect()->route('modules.index')->with('success', 'Module updated successfully.');
    }

    public function destroy($module)
    {
       $find=ModuleIdiom::where('module_id',$module)->get();
       $findmodule=Module::find($module);

        if(isset($find))
        {
            foreach($find as $f){
                $f->delete();
            }
        }
        $findmodule->delete();

        return redirect()->route('modules.index')
            ->with('success', 'Module deleted successfully.');
    }
}
