<?php

namespace App\Http\Controllers;

use App\Models\City;
use App\Models\Contact;
use App\Models\Country;
use App\Models\Idiom;
use Illuminate\Http\Request;

class ContactController extends Controller
{
      public function index()
    {
        $contacts = Contact::all();
        $countries = Country::all();
        $cities = City::all();
        $idioms = Idiom::all();
        
        return view('panel.contact.index', compact('contacts', 'cities', 'countries','idioms'));
    }


    public function show($contact)
    {
        $contact=Contact::find($contact);
        $countries = Country::all();
        $cities = City::all();
        $idioms=Idiom::all();

        return view('panel.contact.show',compact('contact', 'countries', 'cities','idioms'));
    }



    public function destroy($contact)
    {
        $findcontact=Contact::find($contact);
        $findclient->delete();

        return redirect()->route('contact.index')
            ->with('success', 'Contact deleted successfully.');
    }
}
