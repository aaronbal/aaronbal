<?php

namespace App\Http\Controllers\Agenda;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Agenda as Contact;

class AgendaController extends Controller
{
    public function store(Request $request)
    {
        
        
        $id=$request->id;

        //dd($id);
        if($id=="" || $id==null){
        $contact = new Contact;
        }else{
        $contact = Contact::find($request->id);

        }
        
        $contact->name = $request->name;
        $contact->last = $request->last;
        $contact->alias = $request->alias;
        $contact->cel = $request->cel;
        $contact->tel = $request->tel;
        $contact->address = $request->address;
        $contact->email = $request->email;
        $contact->description = $request->description;
        $contact->save();

        return response()->json(['success' => true]);
    }


    public function getcontacts(Request $request)
    {
             
        $contactos = Contact::all()->toArray();

        //dd($contactos);
        return $contactos;
    }


    public function getcontactinfo(Request $request)
    {
             
        $contacto = Contact::where('id', $request->id)->get()->toArray();
        //dd($contactos);
        return $contacto;
    }



    public function delete(Request $request)
    {
             
        $contact = Contact::find($request->id);
        $contact->delete();
        

        return response()->json(['success' => true]);
    }

   
}
