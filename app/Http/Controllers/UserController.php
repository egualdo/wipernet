<?php

namespace App\Http\Controllers;

use App\Models\InterestedUser;
use App\Models\Newsletter;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Role;
use App\Exports\UsersExport;
use App\Exports\NewslettersExport;
use App\Models\Country;
use App\Models\Contact;
use App\Models\Idiom;
use Illuminate\Contracts\Session\Session;
// use Illuminate\Contracts\Session\Session;
use Illuminate\Support\Facades\Session as FacadesSession;
use Maatwebsite\Excel\Facades\Excel;
// use Symfony\Component\HttpFoundation\Session\Session as SessionSession;

class UserController extends Controller
{
    public function index()
    {
        $users = User::all();
        return view('panel.users.index', compact('users'));
    }

    public function create()
    {
        $roles = Role::all();
        return view('panel.users.create', compact('roles'));
    }

    public function store(Request $request)
    {
        $user = new User;
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = bcrypt($request->password);
        $user->role_id = $request->role_id;
        $user->save();
        return redirect()->route('users.index')->with('success', 'Usuario creado satisfactoriamente');
    }

    public function edit($id)
    {
        $user = User::find($id);
        $roles = Role::all();
        return view('panel.users.edit', compact('user', 'roles'));
    }

    public function update(Request $request, $id)
    {
        $user = User::find($id);
        $user->name = $request->name;
        $user->email = $request->email;
        if ($request->password) {
            $user->password = bcrypt($request->password);
        }
        $user->role_id = $request->role_id;
        $user->save();
        return redirect()->route('users.index')->with('success', 'Usuario actualizado satisfactoriamente');
    }

    public function destroy($id)
    {
        $user = User::find($id);
        $user->delete();
        return redirect()->route('users.index')->with('success', 'Usuario eliminado satisfactoriamente');
    }


     public function newsletter(Request $request)
    {
        try {
            $user = Newsletter::where('email',$request->email)->first();
            
            if(!$user){
              $newsletter = Newsletter::create(['email'=>$request->email]);
                   return response()->json(['success'=>'Success','code'=>200 ]);
            }else{
                   return response()->json(['warning'=>'You already registered','code'=>422 ]);
            }

        

        }catch (\Exception $th) {
            return response()->json(['error'=>$th->getMessage(),'code'=>401 ]);
        }
       
    }


     public function interestedUsers(Request $request)
    {
        try {
            $interestedFound = InterestedUser::where('email',$request->email)->first();
            
            if(!$interestedFound){

                $interested = InterestedUser::create([
                                                    'name'=>$request->name,
                                                    'lastname'=>$request->lastname,
                                                    'email'=>$request->email,
                                                    'country'=>$request->country,
                                                    'phone'=>$request->phone,
                                                    'company'=>$request->company,
                                                    'data_research_id'=>$request->data_research_id,
                                                    'idiom_id'=>Idiom::where('acronym',session('locale'))->first()->id
                                                    ]);

                return response()->json(['success'=>'Success','code'=>200 ]);
            }else{
                return response()->json(['success'=>'You already registered','code'=>422 ]);
            }

        }catch (\Exception $th) {
            return response()->json(['error'=>$th->getMessage(),'code'=>401 ]);
        }
       
        // return redirect()->back()->with('success', 'Suscripcion creada satisfactoriamente');
    }

     public function contactUsers(Request $request)
    {
        try {
            $contactFound = Contact::where('email',$request->email)->first();

            $idiom=Idiom::where('acronym',FacadesSession::get('locale'))->first();
            if($idiom){
                $idiomfound=$idiom->id;
            }else{
                $idiomfound=null;
            }

            if(!$contactFound){

                $contact = Contact::create([
                                            'name'=>$request->name,
                                            'lastname'=>$request->lastname,
                                            'email'=>$request->email,
                                            'country'=>$request->country,
                                            'phone'=>$request->phone,
                                            'company'=>$request->company,
                                            'idiom_id'=>$idiomfound,
                                            'comments'=>$request->comments,
                                            'newsletter'=>$request->newsletter == 'true' ? true:false,
                                        ]);

                if($request->newsletter){
                    $newsletterFound = Newsletter::where('email',$request->email)->first();
                    if(!$newsletterFound){
                        $newslet=Newsletter::create(['email'=>$request->email]);
                    }
                }

                return response()->json(['success'=>'Success','code'=>200 ]);
            }else{
                return response()->json(['success'=>'You already registered','code'=>422 ]);
            }

        }catch (\Exception $th) {
            return response()->json(['error'=>$th->getMessage(),'code'=>401 ]);
        }
       
        // return redirect()->back()->with('success', 'Suscripcion creada satisfactoriamente');
    }

     public function exportInterestedUsers() 
    {
        return Excel::download(new UsersExport, 'users.xlsx');
    }

    public function exportNewsletters() 
    {
        return Excel::download(new NewslettersExport, 'newsletters.xlsx');
    }

    public function exportContacts() 
    {
        return Excel::download(new ContactsExport, 'contacts.xlsx');
    }
}
