<?php

namespace App\Http\Controllers;

use App\Models\PhoneBook;
use Illuminate\Http\Request;

class PhoneBookController extends Controller
{
    public function index()
    {  
        $contacts = PhoneBook::all();

        return view('phoneBookList', compact('contacts'));
    }

    public function create(Request $request)
    {
        $request->validate([

        
        // $this->validate(request(), [
            'name' => 'required',
            'email' => 'required',
            'contact' => 'required'
        ]);
        //REQUEST
        //HELPER
        //REQ CLASS
        // dd('hi form');
        // dd($request->all());

        PhoneBook::create([
            'name' => \request('name'),
            'email' => \request('email'),
            'contact' => \request('contact')
        ]);

        return redirect()->back()->with('success','Contact Added!');
    }

    public function showEdit($id){
        // $contact = PhoneBook::where('id',$id)->first();
        // $contact = PhoneBook::where('id',$id)->get();
        $contact = PhoneBook::find($id);

        // dd($contact);

        return view('edit',compact('contact'));
    }

    public function edit(Request $request,$id){

        $request->validate([ 


        // $this->validate(request(), [
            'name' => 'required',
            'email' => 'required',
            'contact' => 'required'
        ]);


        PhoneBook::find($id)->update([
            'name' => \request('name'),
            'email' => \request('email'),
            'contact' => \request('contact')

        ]);

        // $contact = PhoneBook::find($id);
        // $contact->update([
        //     'name' => \request('name'),
        //     'email' => \request('email'),
        //     'contact' => \request('contact')
       
        // ]);


        return redirect()->route('contactList');
    }

    public function delete($id){

        // PhoneBook::find($id)->delete();
        PhoneBook::findOrFail($id)->delete();

        return redirect()->route('contactList');

    }

    
}
