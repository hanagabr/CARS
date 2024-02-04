<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use App\Models\Category;
use App\Traits\Common; 
use Symfony\Component\HttpFoundation\Test\Constraint\ResponseIsRedirected;


class CategoryController extends Controller
{
    use Common;
    private $columns = ['category_name'];

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $cats =Category::get();
        return view('Categories', compact('cats'));

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('addCategory');

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $messages= $this->messages();

        $data =$request->validate([
        'category_name'=>'required|string'
   
        ], $messages);

        Category::create($data);

        return view('addCategory');

    
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $categories = Category::withCount('cars')->get();
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
           $cats = Category::findOrFail($id);
        return view('editCategory',compact('cats'));

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {

        $messages= $this->messages();

        $data =$request->validate([
        'category_name'=>'required|string'
   
        ], $messages);

        Category::where('id', $id)->update($data);
        return 'Updated';

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Category::where('id', $id)->delete();
        return redirect('categories');

    }
    public function messages(){
        return [
            'category_name.required'=>'enter category',

        ];
    }

}
