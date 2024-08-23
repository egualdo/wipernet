<?php

namespace App\Http\Controllers;

use App\Models\Staff;
use App\Models\StaffIdiom;
use App\Models\Country;
use App\Models\Idiom;
use App\Models\City;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Http\Requests\StoreStaffRequest;
use App\Http\Requests\UpdateStaffRequest;
use Illuminate\Support\Facades\Storage;

class StaffController extends Controller
{

    public function index()
    {
        $countries = Country::all();
        $cities = City::all();
       // $idioms = Idiom::all();
        $staffs = Staff::all();


        // verifica si obtienes los datos correctamente


        return view('panel.staff.index', compact('staffs', 'countries', 'cities'));
    }

    public function create()
    {
        $countries = Country::all();
        $cities = City::all();
        $idioms = Idiom::all();
        return view('panel.staff.create', compact('countries', 'cities', 'idioms'));
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'nullable|string|max:255',
            // 'photo' => 'nullable|image|max:1024',
            'country_id' => 'nullable|array',
            'country_id.*' => 'exists:countries,id',
            'city_id' => 'nullable|array',
            'city_id.*' => 'exists:cities,id',
            'idiom_id' => 'nullable|array',
            'idiom_id.*' => 'exists:idioms,id',
            'linkedin' => 'nullable|string|max:255',

        ]);
        try {

            $datos=$request->all();

            $staff = new Staff();

            
            $staff->name = $validatedData['name'];
            $staff->linkedin = $validatedData['linkedin'];
            $staff->country_id =   isset($request->country_id) == true ? $validatedData['country_id']:null ;
            $staff->city_id =      isset($request->city_id) == true ? $validatedData['city_id']:null;
            if ($request->hasFile('photo')) {
                // $fileName = $request->file('photo')->getClientOriginalName();
                // $path = $request->file('photo')->storeAs('public/staff', $fileName);
                 $path = Storage::disk('s3')->put(env("FILESYSTEM_PATH"), $request->file('photo'),'public');
                        $path = Storage::disk('s3')->url($path);
                $staff->photo = $path;//'storage/staff/' . $fileName;
            }
            $staff->user_id = auth()->user()->id;
            $staff->save();

            $staffLast = Staff::with('user')->get()->last();


            foreach($request->idiom_id as $i){
                
                $staffIdiom = new staffIdiom();
                $staffIdiom->staff_id = $staffLast->id;
                $staffIdiom->idiom_id = $i;
                $staffIdiom->description =$datos["description_".$i];
                $staffIdiom->slug = Str::slug($datos["slug_".$i] ?? $datos["title_".$i], '_');
                $staffIdiom->save();
                
            }

            
        } catch (\Throwable $e) {
            dd($e);
        }

        return redirect()->route('staffs.index')
            ->with('success', 'Staff created successfully.');
    }


    public function edit(Staff $staff)
    {

        $staf=$staff->load(['idioms']);
        $countries = Country::all();
        $cities = City::all();
        $idioms = Idiom::all();


        $idiomsSelect=array();
        $array_data = array();
        foreach($staf->idioms as $i){
            array_push($idiomsSelect,$i->id);

            $id_idiom = $i->id;
            $data=StaffIdiom::with('idiom')->where('idiom_id',$id_idiom)->where('staff_id',$staf->id)->get();
            array_push($array_data,$data);
        }

        $arrayNot=Idiom::whereNotIn('id',$idiomsSelect)->get();
        

        foreach($arrayNot as $n){

            $obj = new \stdClass();

            $obj->id = null;
            $obj->staff_id= null;
            $obj->idiom_id= $n->id;
            $obj->description=null;
            $obj->slug=null;
            $obj->created_at=null;
            $obj->updated_at=null;
            $obj->idiom=$n;

            array_push($array_data,[$obj]);
            
        }
        return view('panel.staff.edit', compact('staff','idiomsSelect', 'countries', 'cities', 'idioms','array_data'));
    }
    public function show(Staff $staff)
    {

        $staf=$staff->load(['idioms']);

        $array_data = array();
      
        foreach($staf->idioms as $i){
            
            $id_idiom = $i->id;

           $data=StaffIdiom::with('idiom')->where('idiom_id',$id_idiom)->where('staff_id',$staf->id)->get();

           array_push($array_data,$data);
            
        }

        $countries = Country::all();
        $cities = City::all();
        $idioms = Idiom::all();
        return view('panel.staff.show', compact('staf', 'countries', 'cities', 'array_data', 'idioms'));
    }

    public function update(Request $request, Staff $staff)
    {
        $validatedData = $request->validate([
            'name' => 'nullable|string|max:255',
            'photo' => 'nullable|image|max:1024',
            'country_id' => 'nullable|array',
            'country_id.*' => 'exists:countries,id',
            'city_id' => 'nullable|array',
            'city_id.*' => 'exists:cities,id',
            'idiom_id' => 'nullable|array',
            'idiom_id.*' => 'exists:idioms,id',
            'linkedin' => 'nullable|string|max:255',
        ]);

        try {

            $datos=$request->all();
            $staff->name = $validatedData['name'];
            $staff->linkedin = $validatedData['linkedin'];
            $staff->country_id =    isset($request->country_id) == true ? $validatedData['country_id']:null;
            $staff->city_id =       isset($request->city_id) == true ? $validatedData['city_id']:null;
            if ($request->hasFile('photo')) {
                // Eliminar la imagen anterior
            //    $stringg= str_replace('storage/','public/', $staff->photo);
         
                // dd(Storage::exists($stringg));
                if ($staff->photo) {
                    if(Storage::exists($staff->photo)){
                        Storage::disk('s3')->delete($staff->photo);
                        /*
                            Delete Multiple files this way
                            Storage::delete(['upload/test.png', 'upload/test2.png']);
                        */
                    }
                    // \Storage::delete($staff->photo);
                }

                // Guardar la nueva imagen
                //  $fileName = $request->file('photo')->getClientOriginalName();
                // $path = $request->file('photo')->storeAs('public/staff', $fileName);
                 $path = Storage::disk('s3')->put(env("FILESYSTEM_PATH"), $request->file('photo'),'public');
                        $path = Storage::disk('s3')->url($path);
                $staff->photo = $path;//'storage/staff/' . $fileName;
                // $staff->photo = $request->file('photo')->store('storage/staff');
            }
            $staff->user_id = auth()->user()->id;
            $staff->save();

          

    
            $staffIdiom=StaffIdiom::where('staff_id',$staff->id)->get();
            foreach($staffIdiom as $d){
                $d->delete();
            }
        
            foreach($request->idiom_id as $i){
                
                $staffIdiom = new StaffIdiom();
                $staffIdiom->staff_id = $staff->id;
                $staffIdiom->idiom_id = $i;
                $staffIdiom->description =$datos["description_".$i];            
                $staffIdiom->slug = Str::slug($datos["slug_".$i] ?? $datos["title_".$i], '_');
                $staffIdiom->save();
                
            } 

            
            
        } catch (\Throwable $e) {
            dd($e);
        }

        return redirect()->route('staffs.index')
            ->with('success', 'Staff updated successfully.');
    }

    public function destroy(Staff $staff)
    {

        $find=StaffIdiom::where('staff_id',$staff->id)->get();

        if(isset($find))
        {
            foreach($find as $f){
                $f->delete();
            }
        }
        

        $staff->delete();

        return redirect()->route('staffs.index')
            ->with('success', 'Staff deleted successfully.');
    }
}