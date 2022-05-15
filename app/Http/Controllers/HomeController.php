<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TravelPackage;
use Illuminate\Support\Facades\Storage;

class HomeController extends Controller
{
    
    public function home(Request $request)
    {   
        $listOfTravel = TravelPackage::with(['gallery'])->get(); //returnnya collection
        return view('pages.home', [
            'title'  => 'Explore The World as Easy One Click',
            'listOfTravel' => $listOfTravel
        ]);
    }
    
}
