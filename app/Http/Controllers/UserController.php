<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use App\Models\UserModel;
use App\Traits\Common; 
use Symfony\Component\HttpFoundation\Test\Constraint\ResponseIsRedirected;

class UserController extends Controller
{
    use Common;
    private $columns =[ 'Full_name', 'userName','email','active','password'];
    
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = UserModel::get();
        return view('Users', compact('users'));

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('addUser');

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $messages= $this->messages();

        $data = $request->validate([
            'Full_name'=>'required|string',
            'userName'=>'required|string',
            'email' => 'required|string',
            'password' => 'required|string',

        ], $messages);

        $data['active'] = isset($request->active);
        UserModel::create($data);

        return view('addUser');

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $users = UserModel::findOrFail($id);
        return view('Users',compact('users'));

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $users = UserModel::findOrFail($id);
        return view('editUser',compact('users'));

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $messages= $this->messages();

        $data=$request->validate([
            'Full_name'=>'required|string',
            'userName'=>'required|string',
            'email'=>'required|string',
            'password'=>'required|string',
        ], $messages);
    
        $data['active'] = isset($request->active);
        UserModel::where('id', $id)->update($data);
        return 'Updated';

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
    public function messages(){
        return [
            'Full_name.required'=>'enterfull name',
            'userName.required'=> 'enter user name',
            'email.required'=> 'enter user email',

        ];
    }
}


