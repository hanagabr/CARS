<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Testmon;
use App\Models\Car;

class CarsController extends Controller
{
public function index(){
    $cars = Car::get();
   $cars = Car::paginate(6);
   $testmons =Testmon::limit(3)->get();

   return view('listing' , compact('cars','testmons'));
}
public function car(){
    $cars = Car::limit(6)->get();
    $testmons =Testmon::limit(3)->get();
    return view('cars' , compact('cars','testmons'));
}

public function testemony(){
    $testmons =Testmon::get();
    return view('testimonials', compact('testmons'));
}
public function blog(){
    return view('blog');
}
public function aboutUs(){
    return view('about');
}
public function contact(){
    return view('contact');
}
public function addCar(){
    return view('addCar');
}


public function showCar(){
    return view('carList');
}

public function testmonList(){
    return view('testmonList');
}
//public function update(){
    //return view('editTestmon');
//}

public function addUser(){
    return view('addUser');
}


public function user(){
    return view('Users');
}
public function catList(){
    return view('addCategory');
}
public function cats(){
    return view('categories');
}

public function message(){
    $messages = ContactMail::get();
    return view('message', compact('messages'));
    return view('message' ,'emails.showMessage');
}

}
