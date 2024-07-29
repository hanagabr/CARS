<?php

namespace App\Http\Controllers\ApiControllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Car;
use App\Models\Testmon;

class CarsController extends Controller
{
    public function index(){
        $cars = Car::get();
       $cars = Car::paginate(6);
       $testmons =Testmon::limit(3)->get();
       $headers=['null'];
       return response()->json($cars, 200, $headers);
    }
    
}
