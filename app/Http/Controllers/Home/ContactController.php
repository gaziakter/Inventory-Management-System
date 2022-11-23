<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Contact;
use Illuminate\Support\Carbon;


class ContactController extends Controller
{
    //
    public function ContactMe(){
        return view('frontend.contact_me');
    }

    public function StoreMessage(Request $request){

        Contact::insert([
            'name' => $request->name,
            'email' => $request->email,
            'subject' => $request->subject,
            'phone' => $request->phone,
            'message' => $request->message,
            'created_at' => Carbon::now()
        ]);             
    
        $notification = array(
        'message' => 'Message Send Successfully', 
        'alert-type' => 'success'
        );

    return redirect()->back()->with($notification);
    }

    public function AllMessage(){
        $AllMessage = Contact::latest()->get();
        return view('admin.contact.all_message', compact('AllMessage'));
    }

    public function ShowMessage($id){
        $ShowMessage = Contact::findOrFail($id);
        return view('admin.contact.show_message', compact('ShowMessage'));
    }

    public function DeleteMessage($id){
        $DeleteMessage = Contact::findOrFail($id);
        Contact::findOrFail($id)->delete();

        $notification = array(
            'message' => 'Message Deleted Successfully', 
            'alert-type' => 'success'
        );

        return redirect()->route('all.message')->with($notification);
    }
}
