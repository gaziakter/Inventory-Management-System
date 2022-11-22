<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use App\Models\Footer;
use Illuminate\Support\Carbon;
use Illuminate\Http\Request;

class FooterController extends Controller
{
    // Show footer information
    public function FooterAll(){
        $footer = Footer::find(1);
        return view('admin.footer_all', compact('footer'));
    }

    // Update footer content
    public function UpdateFooter(Request $request){

        $footer_id = $request->id;

            Footer::findOrFail($footer_id)->update([
                'phone' => $request->phone,
                'short_description' => $request->short_description,
                'address' => $request->address,
                'email' => $request->email, 
                'facebook' => $request->facebook, 
                'twitter' => $request->twitter, 
                'copyright' => $request->copyright, 
                'updated_at' => Carbon::now()


            ]); 
            $notification = array(
            'message' => 'Footer Updated Successfully', 
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);

     } // End Method 
}
