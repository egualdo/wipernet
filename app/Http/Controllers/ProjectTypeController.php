<?php

namespace App\Http\Controllers;

use App\Models\ProjectType;
use App\Models\Country;
use App\Models\Idiom;
use App\Models\City;
use App\Models\ProjectTypesIdiom;
use App\Models\ProjectTypeTags;
use App\Models\Tags;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class ProjectTypeController extends Controller
{

    public function index()
    {
        $projectTypes = ProjectType::with('idioms')->get();
        $tags=Tags::all();
        $countries = Country::all();
        $cities = City::all();

        return view('panel.projectTypes.index', compact('projectTypes', 'countries', 'cities','tags'));
    }

    public function create()
    {
        $countries = Country::all();
        $cities = City::all();
        $idioms = Idiom::all();
        $tags=Tags::all();
         return view('panel.projectTypes.create', compact('countries', 'cities', 'idioms','tags'));
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
                'name'=>'required'
        ]);
        
        try {
            $datos=$request->all();
            // dd($request->tags);
            $pr = new ProjectType();
            $pr->country_id = isset($request->country_id) == true ? $validatedData['country_id']:null;
            $pr->city_id =    isset($request->city_id) == true ? $validatedData['city_id']:null;
            $pr->name = ($validatedData['name']);
            $pr->user_id = auth()->user()->id;
            $pr->client_id = 0;
             if ($request->hasFile('photo')) {
                // $fileName = $request->file('photo')->getClientOriginalName();
                // $file = $request->file('photo');
                // $path = Storage::disk('public')->put('projectTypes/'.$fileName,  \File::get($file));
                // $path = Storage::disk('public')->url($path);
                //          $path =     $request->file('photo')->storeAs('/public/projectTypes', $fileName);
     
                         $path = Storage::disk('s3')->put(env("FILESYSTEM_PATH"), $request->file('photo'),'public');
                         $path = Storage::disk('s3')->url($path);
                $pr->photo = $path;//'storage/projectTypes/' . $fileName;
            }
            $pr->save();

            foreach ($request->tags as  $value) {
                
                $ptt =  DB::table('tags')->where('name',trim(strtolower($value)))->first();
                
                if(!$ptt){
                   $created= Tags::create(['name'=>strtolower($value)]);
                    ProjectTypeTags::create([
                        'tag_id'=>$created->id,
                        'project_type_id'=>$pr->id
                    ]);
                }else{
                     ProjectTypeTags::create([
                        'tag_id'=>$ptt->id,
                        'project_type_id'=>$pr->id
                    ]);
                }
                
            }
            

            $prLast = ProjectType::with('user')->get()->last();



            foreach($request->idiom_id as $i){
                $prIdiom = new ProjectTypesIdiom();
                $prIdiom->project_type_id = $prLast->id;
                $prIdiom->idiom_id = $i;
                $prIdiom->projectType = $datos["projectType_".$i];
                // $prIdiom->description =$datos["description_".$i];
                // $prIdiom->slug = Str::slug($datos["slug_".$i] ?? $datos["title_".$i], '_');
                $prIdiom->save();
            }

        } catch (\Throwable $e) {
            dd($e);
        }

        return redirect()->route('projectTypes.index')
            ->with('success', 'ProjectType created successfully.');
    }


    public function edit(ProjectType $projectType)
    {

        $projectType=ProjectType::with(['idioms','tags'])->find($projectType->id);
        $tags=$projectType->tags->pluck('id')->toArray();
        // dd($tags);
        $countries = Country::all();
        $cities = City::all();
        $idioms = Idiom::all();

        $idiomsSelect=array();
        $array_data = array();
        foreach($projectType->idioms as $i){
            array_push($idiomsSelect,$i->id);

            $id_idiom = $i->id;
            $data=ProjectTypesIdiom::with('idiom')->where('idiom_id',$id_idiom)->where('project_type_id',$projectType->id)->get();
            array_push($array_data,$data);
        }

        $arrayNot=Idiom::whereNotIn('id',$idiomsSelect)->get();
        

        foreach($arrayNot as $n){

            $obj = new \stdClass();

            $obj->id = null;
            $obj->project_type_id= null;
            $obj->idiom_id= $n->id;
            $obj->projectType=null;
            // $obj->description=null;
            $obj->tags=null;
            $obj->created_at=null;
            $obj->updated_at=null;
            $obj->idiom=$n;

            array_push($array_data,[$obj]);
            
        }
        return view('panel.projectTypes.edit', compact('projectType', 'countries', 'cities', 'idioms','array_data','idiomsSelect','tags'));
    }

    public function update(Request $request, ProjectType $projectType)
    {
        
        $validatedData = $request->validate([
            'country_id' => 'nullable|array',
            'country_id.*' => 'exists:countries,id',
            'city_id' => 'nullable|array',
            'city_id.*' => 'exists:cities,id',
            'idiom_id' => 'nullable|array',
            'idiom_id.*' => 'exists:idioms,id',
            'tags' => 'sometimes|required|array',
            'tags.*.tag' => 'sometimes|required|string',
            'tags.*.id' => 'sometimes|required|integer'
            // 'name'=>'required'
        ]);

        // dd($projectType);

        try {
            $datos=$request->all();
           
            $projectType->country_id = isset($request->country_id) == true ? $validatedData['country_id']:null;
            $projectType->city_id =    isset($request->city_id) == true ? $validatedData['city_id']:null;
            // $projectType->name = $datos['name'];
            $projectType->user_id = auth()->user()->id;

            if ($request->hasFile('photo')) {
                 if ($projectType->photo) {
                    if(Storage::exists($projectType->photo)){
                        Storage::disk('s3')->delete($projectType->photo);
                    }
                }
               
                    // $fileName = time() . '.' .$request->file('photo')->getClientOriginalName();
                    // $path = $request->file('photo')->storeAs('public/projectTypes', $fileName);
                    $path = Storage::disk('s3')->put(env("FILESYSTEM_PATH"), $request->file('photo'),'public');
                    $path = Storage::disk('s3')->url($path);
                    $projectType->photo = $path;//'storage/projectTypes/' . $fileName;
    
            }
            // dd($projectType);
            $projectType->save();
            
    
            $projectTypeIdiom=ProjectTypesIdiom::where('project_type_id', $projectType->id)->get();
            foreach($projectTypeIdiom as $d){
                $d->delete();
            }
        
            foreach($request->idiom_id as $i){
                
                $projectTypeIdiom = new ProjectTypesIdiom();
                $projectTypeIdiom->project_type_id = $projectType->id;
                $projectTypeIdiom->idiom_id = $i;
                $projectTypeIdiom->projectType = $datos["projectType_".$i];
                // $projectTypeIdiom->description =$datos["description_".$i];
                // $projectTypeIdiom->slug = Str::slug($datos["slug_".$i] ?? $datos["title_".$i], '_');
                $projectTypeIdiom->save();

            }


            //modificando los elementos TAGS

            if(  $request->filled('tags') ){
                $projectType->tags()->sync($request->tags,["created_at"=>Carbon::now(),"updated_at"=>Carbon::now()]);
            }


             return redirect()->route('projectTypes.index')->with('success', 'Project Type updated successfully.');
        } catch (\Exception $e) {
            dd($e);
        }

       
    }


    public function destroy(ProjectType $projectType)
    {
        $find=ProjectTypesIdiom::where('project_type_id',$projectType->id)->get();
        // dd($find);
        if(isset($find))
        {
            foreach($find as $f){
                $f->delete();
            }
        }
        $projectType->delete();

        return redirect()->route('projectTypes.index')
            ->with('success', 'ProjectType deleted successfully.');
    }

    public function taskboardView(Request $request)
    {
            $tags=Tags::all();
            $returnHTML = view('panel.projectTypes.select', compact('tags'))->render();
         

            return response()->json(
                [   'code'=>200,
                    'message' => 'Success',
                    'html' => $returnHTML,
                ]
            );
    }
}
