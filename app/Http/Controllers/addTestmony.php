<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use App\Models\Testmon;
use App\Traits\Common; 
use Symfony\Component\HttpFoundation\Test\Constraint\ResponseIsRedirected;

class addTestmony extends Controller
{
    /**
     * Display a listing of the resource.
     */
    use Common;
    private $columns = ['name', 'position','content','published','image'];

    public function index()
    {
        $testmons=Testmon::get();
        return view('testmonList', compact('testmons'));

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('addTestmon');

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
      $request['published'] = isset($request->published);

      Testmon::create($request->all());
        return redirect()->route('addTestmon')->with('done');

       // $messages= $this->messages();

        //$data= $request->validate([
          //'name'=>'required|string',
          //'position'=>'required|string',
           //'content'=>'required|string',
            //'image' =>'required|mimes:png,jpg,jpeg|max:2048',
             // ], $messages);

        //$fileName= $this->uploadFile($request->image, 'assets/images');
        //$data['image']= $fileName;
        //Testmon::create($data);
        //return 'done';

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $testmons = Testmon::findOrFail($id);
        return view('testmonials',compact('testmons'));
  
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
       $testmons =Testmon::findOrFail($id);
        return view('editTestmon',compact('testmons'));

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
          //$messages= $this->messages();

          //   $data = $request->validate([
    //        'name'=>'required|string',
      //      'position'=>'required|string',
        //   'content'=>'required|string',
          //  'image' => 'required|mimes:png,jpg,jpeg|max:2048',
        //], $messages);


       
        //$data['published'] = isset($request->published);

        // update image if new file selected
      //  if($request->hasFile('image')){
        //    $fileName = $this->uploadFile($request->image, 'assets/images');
          //  $data['image']= $fileName;
        //}

        //return dd($data);
        $request['published'] = isset($request->published);

        Testmon::create($request->all());
          return redirect()->route('addTestmon')->with('done');
  
          Testmon::where('id', $id)->update($data);
        return 'Updated';

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
      Testmon::where('id', $id)->delete();
      return redirect('testmonList');

    }
    public function messages(){
        return [
            'name.required'=>'enter title name',
            'content.required'=> 'enter  content',
            'position.required'=> 'enter   numbers of position',
            'image.required'=> 'choose image',            
        ];
    }

}
