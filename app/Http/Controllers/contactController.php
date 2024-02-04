<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Mail;
use App\Mail\ContactUs;
use App\Models\ContactMail;
use App\Models\User;
use App\Notifications\InvoicePaid;
use Illuminate\Support\Facades\Notification;
class contactController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $messages = ContactMail::get();
       return view('message', compact('messages'));

    }

    public function contact(Request $request){

  //$data = $request->validate([
    //'fname'=>'required|string',
    //'lname'=>'required|string',
   // 'mail'=>'required|string',
   // 'content'=>'required|string|max:400',
 // ]);

 // ContactMail::create($data);
 // Mail::to('hana@gmail.com')->send(new ContactUs($data));
//return redirect()->back()->with('success', 'email sent');

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $messages = ContactMail::get();
        return view('contact', compact('messages'));
 
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

       /** 
      *  $data = $request->validate([
      * 'fname'=>'required|string',
      * 'lname'=>'required|string',
     * 'mail'=>'required|string',
       *'content'=>'required|string|max:400',
           * ]);*/
            

       $data= ContactMail::create($request->all());
         Mail::to('hana@gmail.com')->send(new ContactUs($request));

        $users=User::all();
       $message_id= auth()->user()->get();
       $user_create= auth()->user()->get();
       $created_at= auth()->user()->get();
       $content= auth()->user()->get();

       Notification::send($users, new InvoicePaid($data->id, $user_create,$created_at,$data->content));
        return redirect()->route('contact')->with('done');
        
        
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $data = ContactMail::findOrFail($id);
        return view('emails.showMessage',compact('data'));
  
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        ContactMail::where('id', $id)->delete();
        return redirect('message');

    }
}
