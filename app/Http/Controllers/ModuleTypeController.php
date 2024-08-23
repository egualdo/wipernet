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
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class ModuleTypeController extends Controller
{
    //'name','preview','text','image','video','title','subtitle','file'

    public function index()
    {
        $moduletypes = ModuleType::all();
        $countries = Country::all();
        $cities = City::all();
        
        return view('panel.moduleTypes.index', compact('moduletypes', 'cities', 'countries'));
    }

    public function create()
    {
        $countries = Country::all();
        $cities = City::all();
        $projectTypes= ProjectType::all();
        return view('panel.moduleTypes.create', compact('countries', 'cities','projectTypes'));
    }

    public function store(Request $request)
    {
        // dd(json_encode($request->html));

        try {
       
            $datos=$request->all();

            $module = new ModuleType();
            $module->name = $request->name !== null ? $request->name : '';
            $module->link = $request->link ;
            $module->html = $request->html !== null ? json_encode($request->html) : '';
            $module->json_fields = $request->json_fields !== null ? json_encode($request->json_fields) : '';

            if ($request->hasFile('preview')) {
                // $fileName = time().$request->file('preview')->getClientOriginalName();
                // $path = $request->file('preview')->storeAs('public/moduleTypes', $fileName);
                // dd($_ENV['FILESYSTEM_PATH']);

                $path = Storage::disk('s3')->put(env("FILESYSTEM_PATH"), $request->file('preview'),'public');
                $path = Storage::disk('s3')->url($path);

                //  $file = $request->file('preview');
                //  $fileName = $request->file('preview')->getClientOriginalName();
                // $path = Storage::disk('public')->put('moduleTypes/'.$fileName,  \File::get($file));
                // $path = Storage::disk('public')->url($path);

                $module->preview = $path;//'storage/moduleTypes/' . $fileName;
            }
            //   dd($module);
            $module->save();


        } catch (\Throwable $e) {
            dd($e);
        }

        return redirect()->route('moduleTypes.index')
            ->with('success', 'Module created successfully.');
    }

    public function edit($module)
    {
        $moduleType=ModuleType::find($module);
        $countries = Country::all();
        $cities = City::all();
        
        return view('panel.moduleTypes.edit', compact('moduleType', 'countries', 'cities'));
    }

    public function show($module)
    {
        $moduleType=ModuleType::find($module);
        $countries = Country::all();
        $cities = City::all();

        return view('panel.moduleTypes.show',compact('moduleType', 'countries', 'cities'));
    }

    public function update(Request $request, $module)
    {
        try { 
                $module=ModuleType::find($module);
                
                $module->name = $request->name;
                $module->link = $request->link;
                $module->html = $request->html !== null ? json_encode($request->html) : '';
                $module->json_fields = $request->json_fields !== null ? json_encode($request->json_fields) : '';

            if ($request->hasFile('preview')) {
            //    $stringg= str_replace('storage/','public/', $module->preview);
         
                if ($module->preview) {
                    if(Storage::exists($module->preview)){
                        Storage::disk('s3')->delete($module->preview);
                    }
                }

                // $fileName = $request->file('preview')->getClientOriginalName();
                // $path = $request->file('preview')->storeAs('public/moduleTypes', $fileName);
                $path = Storage::disk('s3')->put(env("FILESYSTEM_PATH"), $request->file('preview'),'public');
                $path = Storage::disk('s3')->url($path);
                $module->preview = $path;//'storage/moduleTypes/' . $fileName;
            }
               
                $module->save();

            } catch (\Exception $e) {
                dd($e);
            }

        return redirect()->route('moduleTypes.index')->with('success', 'Type Module updated successfully.');
    }


    public function destroy($module)
    {
       $findmodule=ModuleType::find($module);
        if(isset($findmodule))
        {
            $findmodule->delete();
        }
       
        return redirect()->route('moduleTypes.index')
            ->with('success', 'Module deleted successfully.');
    }
}
