<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use App\Models\Category;
use App\Models\Car;
use App\Traits\Common; 
use Symfony\Component\HttpFoundation\Test\Constraint\ResponseIsRedirected;

class CarController extends Controller
{
    use Common;
    private $columns = ['title', 'content','luggage','doors','passangers','price','active','image','category_id'];
    
    


    public function index()
    {
        $cars =Car::get();
        return view('carList', compact('cars'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $cats = Category::select('id','category_name')->get();
        return view('addCar', compact('cats'));

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $messages= $this->messages();
      //  Car::create($request->all());
        //return redirect()->route('addCar')->with('done');

       $data = $request->validate([
          'title'=>'required|string',
           'content'=>'required|string',
           'luggage'=>'required|string',
            'doors'=>'required|string',
            'passangers'=>'required|string',
            'price'=>'required|string',
            'category_id'=>'required|string',

            'image' => 'required|mimes:png,jpg,jpeg|max:2048',
        ], $messages);

        $fileName = $this->uploadFile($request->image, 'assets/images');
        $data['image']= $fileName;
        $data['active'] = $request->has('active') ? 0:1;
        Car::create($data);
        return redirect('addCar');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
      $cars = Car::findOrFail($id);
      $cats =Category::get();
      $cats =Category::with('cars')->get();

      return view('single',compact('cars','cats'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $cars =Car::findOrFail($id);
        $cats =Category::get();
        return view('editCar',compact('cars', 'cats'));

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $messages= $this->messages();

        $data = $request->validate([
            'title'=>'required|string',
            'content'=>'required|string',
           'luggage'=>'required|string',
            'doors'=>'required|string',
            'passangers'=>'required|string',
            'price'=>'required|string',
            'category'=>'required|string',
            'image'=>'required|mimes:png,jpg,jpeg|max:2048',
        ], $messages);

       
        $data['active'] = isset($request->active);

        // update image if new file selected
        if($request->hasFile('image')){
            $fileName = $this->uploadFile($request->image, 'assets/images');
            $data['image']= $fileName;
        }

        //return dd($data);
        Car::where('id', $id)->update($data);
        return 'Updated';

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        Car::where('id', $id)->delete();
        return redirect('carList');
    }

    public function messages(){
        return [
            'title.required'=>'enter title name',
            'content.required'=> 'enter  content',
            'doors.required'=> 'enter   numbers of doors',
            'passangers.required'=> 'enter  passangers',
            'price.required'=> 'enter  price',
            'image.required'=> 'choose image',
            'category.required'=> 'choose category',

        ];
    }
}
