<?php

namespace App\Http\Controllers;

use App\Models\Service;
use App\Models\Country;
use App\Models\Idiom;
use App\Models\City;
use App\Models\ProjectTypeTags;
use App\Models\ServicesIdiom;
use App\Models\ServiceTags;
use App\Models\Tags;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class ServiceController extends Controller
{

    public function index()
    {
        $services = Service::with('idioms')->get();
         $tags=Tags::all();
        $countries = Country::all();
        $cities = City::all();
        // dd('aqui');

        return view('panel.services.index', compact('services','tags' ,'cities', 'countries'));
    }




    public function create()
    {
        $countries = Country::all();
        $cities = City::all();
        $idioms = Idiom::all();
        $tags=Tags::all();
        return view('panel.services.create', compact('countries', 'tags','cities', 'idioms'));
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'photo' => 'nullable|image|max:1024',
            'country_id' => 'nullable|array',
            'country_id.*' => 'exists:countries,id',
            'city_id' => 'nullable|array',
            'city_id.*' => 'exists:cities,id',
            'idiom_id' => 'nullable|array',
            'idiom_id.*' => 'exists:idioms,id',
        ]);
        try {

            $datos=$request->all();

            $service = new Service();

            
            if ($request->hasFile('photo')) {
                // $fileName = $request->file('photo')->getClientOriginalName();
                // $path = $request->file('photo')->storeAs('public/services', $fileName);
                 $path = Storage::disk('s3')->put(env("FILESYSTEM_PATH"), $request->file('photo'),'public');
                        $path = Storage::disk('s3')->url($path);
                $service->photo =$path;// 'storage/services/' . $fileName;
            }
            
            $service->country_id = isset($request->country_id) == true ? $validatedData['country_id']:null;
            $service->city_id =    isset($request->city_id) == true ? $validatedData['city_id']:null;
            $service->user_id = auth()->user()->id;
            $service->name =    $datos['name'];
            $service->save();

            foreach ($request->tags as  $value) {
                
                $ptt =  DB::table('tags')->where('name',trim(strtolower($value)))->first();
                
                if(!$ptt){
                   $created= Tags::create(['name'=>strtolower($value)]);
                    ServiceTags::create([
                        'tag_id'=>$created->id,
                        'service_id'=>$service->id
                    ]);
                }else{
                     ServiceTags::create([
                        'tag_id'=>$ptt->id,
                        'service_id'=>$service->id
                    ]);
                }
                
            }

            $serviceLast = Service::with('user')->get()->last();


            foreach($request->idiom_id as $i){
                
                $serviceIdiom = new servicesIdiom();
                $serviceIdiom->service_id = $serviceLast->id;
                $serviceIdiom->idiom_id = $i;
                $serviceIdiom->title = $datos["title_".$i];
                $serviceIdiom->description =$datos["description_".$i];
                $serviceIdiom->slug = Str::slug($datos["slug_".$i] ?? $datos["title_".$i], '_');
                $serviceIdiom->save();
                
            }

        } catch (\Throwable $e) {
            dd($e);
        }

        return redirect()->route('service.index')
            ->with('success', 'Service created successfully.');
    }


    public function edit(Service $service)
    {
        $serv=$service->load(['idioms','tags']);
        
        $tags=$serv->tags->pluck('id')->toArray();
        $countries = Country::all();
        $cities = City::all();
        $idioms = Idiom::all();


        $idiomsSelect=array();
        $array_data = array();
        foreach($serv->idioms as $i){
            array_push($idiomsSelect,$i->id);

            $id_idiom = $i->id;
            $data=ServicesIdiom::with('idiom')->where('idiom_id',$id_idiom)->where('service_id',$serv->id)->get();
            array_push($array_data,$data);
        }

        $arrayNot=Idiom::whereNotIn('id',$idiomsSelect)->get();
        

        foreach($arrayNot as $n){

            $obj = new \stdClass();

            $obj->id = null;
            $obj->service_id= null;
            $obj->idiom_id= $n->id;
            $obj->title=null;
            $obj->name=null;
            $obj->description=null;
            // $obj->photo=null;
            // $obj->file=null;
            $obj->slug=null;
            $obj->tags=null;
            $obj->created_at=null;
            $obj->updated_at=null;
            $obj->idiom=$n;

            array_push($array_data,[$obj]);
            
        }
        
        return view('panel.services.edit', compact('service','idiomsSelect', 'countries', 'cities', 'idioms','array_data','tags'));
    }
        
        
        //pendiente por mostrar tags
    public function show(Service $service)
    {
        
        $serv=$service->load(['idioms']);

        $array_data = array();
      
        foreach($serv->idioms as $i){
            
            $id_idiom = $i->id;

           $data=ServicesIdiom::with('idiom')->where('idiom_id',$id_idiom)->where('service_id',$serv->id)->get();

           array_push($array_data,$data);
            
        }
      
        $countries = Country::all();
        $cities = City::all();
        $idioms = Idiom::all();

        // dd($service);
       
        return view('panel.services.show', compact('service', 'countries', 'cities', 'array_data','idioms'));
    
    }

    public function update(Request $request, Service $service)
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
    
                $service->country_id = isset($request->country_id) == true ? $validatedData['country_id']:null;
                $service->city_id =    isset($request->city_id) == true ? $validatedData['city_id']:null;
                $service->user_id = auth()->user()->id;
                $service->name =    $datos['name'];
                 if ($request->hasFile("photo")) {
    
                    // $fileArchivePhoto = $request->file("photo");
                    // $nameArchivePhoto = time() . '.' . $fileArchivePhoto->getClientOriginalExtension();
                    // $ruta = \Storage::disk('local')->put('public/services/'.$nameArchivePhoto,  \File::get($fileArchivePhoto));
                    // $filePhoto='/storage/services/'.$nameArchivePhoto;

                    // $fileName = time() . '.' .$request->file('photo')->getClientOriginalName();
                    // $path = $request->file('photo')->storeAs('public/services', $fileName);
                     $path = Storage::disk('s3')->put(env("FILESYSTEM_PATH"), $request->file('photo'),'public');
                        $path = Storage::disk('s3')->url($path);
                    $service->photo = $path;//'storage/services/' . $fileName;
    
                }
                $service->save();

              

        
                $serviceIdiom=ServicesIdiom::where('service_id',$service->id)->get();
                foreach($serviceIdiom as $d){
                    $d->delete();
                }
            
                foreach($request->idiom_id as $i){
                    
                    $serviceIdiom = new ServicesIdiom();
                    $serviceIdiom->service_id = $service->id;
                    $serviceIdiom->idiom_id = $i;
                    $serviceIdiom->title = $datos["title_".$i];
                    $serviceIdiom->description =$datos["description_".$i];
                    $serviceIdiom->slug = Str::slug($datos["slug_".$i] ?? $datos["title_".$i], '_');
                    $serviceIdiom->save();
                    
                } 

                //modificando los elementos TAGS

            if(  $request->filled('tags') ){
                $service->tags()->sync($request->tags,["created_at"=>Carbon::now(),"updated_at"=>Carbon::now()]);
            }
               
                return redirect()->route('service.index')->with('success', 'Service updated successfully.');
            } catch (\Throwable $e) {
                dd($e);
            }

      

    }


    public function destroy(Service $service)
    {


        $find=ServicesIdiom::where('service_id',$service->id)->get();

        if(isset($find))
        {
            foreach($find as $f){
                $f->delete();
            }
        }
        
        $service->delete();

        return redirect()->route('service.index')
            ->with('success', 'Service deleted successfully.');
    }

     public function taskboardViewservices(Request $request)
    {
            $tags=Tags::all();
            $returnHTML = view('panel.services.select', compact('tags'))->render();
         

            return response()->json(
                [   'code'=>200,
                    'message' => 'Success',
                    'html' => $returnHTML,
                ]
            );
    }
}