<?php

namespace App\Http\Controllers;

use App\Models\City;
use App\Models\Client;
use App\Models\ClientsIdiom;
use App\Models\Country;
use App\Models\Idiom;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class ClientController extends Controller
{
        public function index()
    {
        $clients = Client::with(['idioms'])->get();
        $countries = Country::all();
        $cities = City::all();
        
        return view('panel.clients.index', compact('clients', 'cities', 'countries'));
    }

    public function create()
    {
        $countries = Country::all();
        $cities = City::all();
        $idioms = Idiom::all();
        return view('panel.clients.create', compact('countries', 'cities', 'idioms'));
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

            $client = new Client();
            $client->country_id = isset($request->country_id) == true ? $validatedData['country_id']:null;
            $client->city_id =    isset($request->city_id) == true ? $validatedData['city_id']:null;
            // if ($request->hasFile("photo")) {

            //     $fileArchivePhoto = $request->file("photo");
            //     $nameArchivePhoto = time() . '.' . $fileArchivePhoto->getClientOriginalExtension();
            //     $ruta = \Storage::disk('local')->put('public/clients/'.$nameArchivePhoto,  \File::get($fileArchivePhoto));
            //     $filePhoto='/storage/caballo/'.$nameArchivePhoto;
            //     $client->photo=$filePhoto;
            // }

            if ($request->hasFile('photo')) {
                // $fileName = $request->file('photo')->getClientOriginalName();
                // $path = $request->file('photo')->storeAs('public/clients', $fileName);
                // $client->photo = 'storage/clients/' . $fileName;
                 $path = Storage::disk('s3')->put(env("FILESYSTEM_PATH"), $request->file('photo'),'public');
                        $path = Storage::disk('s3')->url($path);
                        $client->photo = $path;
            }
            $client->save();

            $clientLast = Client::get()->last();

            foreach($request->idiom_id as $i){
                
                    $clientIdiom = new ClientsIdiom();
                    $clientIdiom->client_id = $clientLast->id;
                    $clientIdiom->idiom_id = $i;
                    $clientIdiom->title = $datos["title_".$i];
                    $clientIdiom->description = $datos["description_".$i];
                    $clientIdiom->slug = Str::slug($datos["slug_".$i] ?? $datos["title_".$i], '_');
                    $clientIdiom->save();
            }

        } catch (\Throwable $e) {
            dd($e);
        }

        return redirect()->route('clients.index')
            ->with('success', 'Client created successfully.');
    }

    public function edit($client)
    {
        $client=Client::with('idioms')->find($client);
        $countries = Country::all();
        $cities = City::all();
        $idioms = Idiom::all();

        $idiomsSelect=array();
        $array_data = array();
        foreach($client->idioms as $i){
            array_push($idiomsSelect,$i->id);
            $id_idiom = $i->id;
            $data=ClientsIdiom::with('idiom')->where('idiom_id',$id_idiom)->where('client_id',$client->id)->get();
            array_push($array_data,$data);
        }

        $arrayNot=Idiom::whereNotIn('id',$idiomsSelect)->get();

        foreach($arrayNot as $n){

            $obj = new \stdClass();
            $obj->id = null;
            $obj->client_id= null;
            $obj->idiom_id= $n->id;
            $obj->title=null;
            $obj->photo=null;
            $obj->slug=null;
            $obj->created_at=null;
            $obj->updated_at=null;
            $obj->idiom=$n;

            array_push($array_data,[$obj]);
        }
        return view('panel.clients.edit', compact('client', 'countries', 'cities', 'idioms','array_data','idiomsSelect'));
    }


    public function show($client)
    {
        $client=Client::with('idioms')->find($client);
    
        $array_data = array();
      
        foreach($client->idioms as $i){
            $id_idiom = $i->id;
           $data=ClientsIdiom::with('idiom')->where('idiom_id',$id_idiom)->where('client_id',$client->id)->get();
           array_push($array_data,$data);
        }
      
        $countries = Country::all();
        $cities = City::all();

        return view('panel.clients.show',          compact('client', 'countries', 'cities', 'array_data'));
    }

    public function update(Request $request, $client)
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

                $client=Client::find($client);
                
                $client->country_id = isset($request->country_id) == true ? $validatedData['country_id']:null;
                $client->city_id =    isset($request->city_id) == true ? $validatedData['city_id']:null;
                if ($request->hasFile('photo')) {
                // Eliminar la imagen anterior
            //    $stringg= str_replace('storage/','public/', $client->photo);
         
                // dd(Storage::exists($stringg));
                if ($client->photo) {
                    if(Storage::exists($client->photo)){
                        Storage::disk('s3')->delete($client->photo);
                        /*
                            Delete Multiple files this way
                            Storage::delete(['upload/test.png', 'upload/test2.png']);
                        */
                    }
                    // \Storage::delete($client->photo);
                }

                // Guardar la nueva imagen
                //  $fileName = $request->file('photo')->getClientOriginalName();
                // $path = $request->file('photo')->storeAs('public/clients', $fileName);
                 $path = Storage::disk('s3')->put(env("FILESYSTEM_PATH"), $request->file('photo'),'public');
                        $path = Storage::disk('s3')->url($path);
                        $client->photo = $path;
                // $client->photo = 'storage/clients/' . $fileName;
                // $client->photo = $request->file('photo')->store('storage/client');
            }
                $client->save();

               
                $clientIdiom=ClientsIdiom::where('client_id',$client->id)->get();
                foreach($clientIdiom as $d){
                    $d->delete();
                }
            
                foreach($request->idiom_id as $i){
                    
                    $clientIdiom = new ClientsIdiom();
                    $clientIdiom->client_id = $client->id;
                    $clientIdiom->idiom_id = $i;
                    $clientIdiom->title = $datos["title_".$i];
                    // $clientIdiom->description = $datos["description_".$i];
                    $clientIdiom->slug = Str::slug($datos["slug_".$i] ?? $datos["title_".$i], '_');
                    $clientIdiom->save();
                    
                } 
               
            } catch (\Throwable $e) {
                dd($e);
            }

      

        return redirect()->route('clients.index')
            ->with('success', 'Client updated successfully.');
    }


    public function destroy($client)
    {
       $find=ClientsIdiom::where('client_id',$client)->get();
       $findclient=Client::find($client);

        if(isset($find))
        {
            foreach($find as $f){
                $f->delete();
            }
        }
        $findclient->delete();

        return redirect()->route('clients.index')
            ->with('success', 'Client deleted successfully.');
    }
}
