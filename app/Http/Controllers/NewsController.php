<?php

namespace App\Http\Controllers;

use App\Models\News;
use App\Models\Country;
use App\Models\Idiom;
use App\Models\City;
use App\Models\NewsIdiom;
use App\Models\NewTags;
use App\Models\Tags;
use App\Models\Topic;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class NewsController extends Controller
{

    public function index()
    {
        $news = News::with(['idioms'])->get();
        $tags=Tags::all();
        $countries = Country::all();
        $cities = City::all();

        return view('panel.news.index', compact('news', 'cities', 'countries','tags'));
    }

    public function create()
    {
        $countries = Country::all();
        $cities = City::all();
        $topics = Topic::all();
        $idioms = Idiom::all();
        $tags=Tags::all();
        return view('panel.news.create', compact('countries', 'cities', 'idioms','topics','tags'));
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
            DB::beginTransaction();
        try {
       
            $datos=$request->all();
            // dd($datos);

            $new = new News();

            $new->country_id = isset($request->country_id) == true ? $validatedData['country_id']:null;
            $new->city_id =    isset($request->city_id) == true ? $validatedData['city_id']:null;
            $new->user_id = auth()->user()->id;
            $new->save();

             foreach ($request->tags as  $value) {
                
                $ptt =  DB::table('tags')->where('name',trim(strtolower($value)))->first();
                
                if(!$ptt){
                   $created= Tags::create(['name'=>strtolower($value)]);
                    NewTags::create([
                        'tag_id'=>$created->id,
                        'new_id'=>$new->id
                    ]);
                }else{
                     NewTags::create([
                        'tag_id'=>$ptt->id,
                        'new_id'=>$new->id
                    ]);
                }
                
            }

            $newsLast = News::with('user')->get()->last();

            foreach($request->idiom_id as $i){
                
                $newsIdiom = new NewsIdiom();
                $newsIdiom->new_id = $newsLast->id;
                $newsIdiom->idiom_id = $i;
                $newsIdiom->title = $datos["title_".$i];
                $newsIdiom->subtitle = $datos["subtitle_".$i];
                $newsIdiom->autor = $datos["autor_".$i];
                $newsIdiom->date = $datos["date_".$i];
                $newsIdiom->topic = $datos["topic_".$i];
                $newsIdiom->description =$datos["description_".$i];
                $newsIdiom->linkedin =$datos["linkedin_".$i];
                $newsIdiom->facebook =$datos["facebook_".$i];
                $newsIdiom->twitter =$datos["twitter_".$i];
                $newsIdiom->email =$datos["email_".$i];
            if ($request->hasFile("photo_".$i)) {

                // $fileArchivePhoto = $request->file("photo_".$i);
                // $nameArchivePhoto = time() . '.' . $fileArchivePhoto->getClientOriginalExtension();
                // $ruta = \Storage::disk('local')->put('public/news/'.$nameArchivePhoto,  \File::get($fileArchivePhoto));
                $path = Storage::disk('s3')->put(env("FILESYSTEM_PATH"), $request->file('photo_'.$i),'public');
                $path = Storage::disk('s3')->url($path);
                $newsIdiom->photo=$path;//'/storage/caballo/'.$nameArchivePhoto;

            }
           
            
                $newsIdiom->slug = Str::slug($datos["slug_".$i] ?? $datos["title_".$i], '_');
                $newsIdiom->save();
                 DB::commit();
                
            }

        } catch (\Throwable $e) {
            DB::rollback();
           return redirect()->back()->withErrors($e->getMessage());
        }

        return redirect()->route('news.index')
            ->with('success', 'News created successfully.');
    }

    public function edit($new)
    {
        $new=(integer)$new;
        $new=News::with(['idioms','tags'])->find($new);
        $tags=$new->tags->pluck('id')->toArray();
        $countries = Country::all();
        $cities = City::all();
        $topics = Topic::all();
        $idioms = Idiom::all();

        $idiomsSelect=array();
        $array_data = array();
        foreach($new->idioms as $i){
            array_push($idiomsSelect,$i->id);
            $id_idiom = $i->id;
            $data=NewsIdiom::with('idiom')->where('idiom_id',$id_idiom)->where('new_id',$new->id)->get();
            array_push($array_data,$data);
        }

        $arrayNot=Idiom::whereNotIn('id',$idiomsSelect)->get();

        foreach($arrayNot as $n){

            $obj = new \stdClass();
            $obj->id = null;
            $obj->new_id= null;
            $obj->idiom_id= $n->id;
            $obj->title=null;
            $obj->subtitle=null;
            $obj->date=null;
            $obj->autor=null;
            $obj->linkedin=null;
            $obj->facebook=null;
            $obj->twitter=null;
            $obj->email=null;
            $obj->description=null;
            $obj->photo=null;
            $obj->slug=null;
            $obj->topic=null;
            $obj->created_at=null;
            $obj->updated_at=null;
            $obj->tags=null;
            $obj->idiom=$n;

            array_push($array_data,[$obj]);
        }
        // dd($array_data);
        return view('panel.news.edit', compact('new', 'countries', 'cities', 'idioms','array_data','idiomsSelect','topics','tags'));
    }


    public function show($new)
    {
        $new=News::with('idioms')->find($new);
    
        $array_data = array();
      
        foreach($new->idioms as $i){
            $id_idiom = $i->id;
           $data=NewsIdiom::with('idiom')->where('idiom_id',$id_idiom)->where('new_id',$new->id)->get();
           array_push($array_data,$data);
        }
      
        $countries = Country::all();
        $cities = City::all();
        $topics = Topic::all();

        return view('panel.news.show',          compact('new', 'countries', 'cities', 'array_data','topics'));
    }

    public function update(Request $request, $new)
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

                $new=News::find($new);
                
                $new->country_id = isset($request->country_id) == true ? $validatedData['country_id']:null;
                $new->city_id =    isset($request->city_id) == true ? $validatedData['city_id']:null;
                $new->user_id = auth()->user()->id;
                
                $new->update();

               
                $newIdiom=NewsIdiom::where('new_id',$new->id)->get();
                foreach($newIdiom as $d){
                    $d->delete();
                }
                
                foreach($request->idiom_id as $i){
                
                    $newIdiom = new NewsIdiom();
                    $newIdiom->new_id = $new->id;
                    $newIdiom->idiom_id = $i;
                    $newIdiom->title = $datos["title_".$i];
                    $newIdiom->subtitle = $datos["subtitle_".$i];
                    $newIdiom->autor = $datos["autor_".$i];
                    $newIdiom->date = $datos["date_".$i];
                    $newIdiom->topic = $datos["topic_".$i];
                    $newIdiom->linkedin =$datos["linkedin_".$i];
                    $newIdiom->facebook =$datos["facebook_".$i];
                    $newIdiom->twitter =$datos["twitter_".$i];
                    $newIdiom->email =$datos["email_".$i];
                    $newIdiom->description =$datos["description_".$i];
                    $newIdiom->slug = Str::slug($datos["slug_".$i] ?? $datos["title_".$i], '_');
                    
                    if ($request->hasFile("photo_".$i)) {
    
                        // $fileName = time() . '.' .$request->file('photo')->getClientOriginalName();
                        // $path = $request->file('photo')->storeAs('public/news', $fileName);
                        $path = Storage::disk('s3')->put(env("FILESYSTEM_PATH"), $request->file('photo_'.$i),'public');
                        $path = Storage::disk('s3')->url($path);
                        $newIdiom->photo = $path;//'storage/news/' . $fileName;
    
                    }else{
                        $newIdiom->photo=$datos["foto_".$i];
                    }
                    $newIdiom->save();
                    
                } 


                //modificando los elementos TAGS

            if(  $request->filled('tags') ){
                $new->tags()->sync($request->tags,["created_at"=>Carbon::now(),"updated_at"=>Carbon::now()]);
            }
               
            } catch (\Exception $e) {
                dd($e);
            }

      

        return redirect()->route('news.index')->with('success', 'New updated successfully.');
    }


    public function destroy($new)
    {
       $find=NewsIdiom::where('new_id',$new)->get();
       $findnews=News::find($new);

        if(isset($find))
        {
            foreach($find as $f){
                $f->delete();
            }
        }
        $findnews->delete();

        return redirect()->route('news.index')
            ->with('success', 'New deleted successfully.');
    }

     public function taskboardViewnews(Request $request)
    {
            $tags=Tags::all();
            $returnHTML = view('panel.news.select', compact('tags'))->render();
         

            return response()->json(
                [   'code'=>200,
                    'message' => 'Success',
                    'html' => $returnHTML,
                ]
            );
    }

    
}
