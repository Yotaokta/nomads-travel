<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TravelPackage;

class DetailController extends Controller
{
    public function home(Request $request, $slug)
    {
        $travelBySlug = TravelPackage::with(['gallery'])->where('slug', $slug)->get();
        $travelDetail = $this->getTravelDetails($travelBySlug);
         return view('pages.detail', [
            'title' => 'Travel to ' . $travelDetail->title,
            'travelWithSlug' => $travelDetail,
            'firstGallery' => $this->getGalleryTravel($travelDetail)[0],
            'travelGallery' => $this->getGalleryTravel($travelDetail)
        ]);
    }

    public function getTravelDetails($travelBySlug)
    {
        foreach ($travelBySlug as  $travel) {
            return $travel;
        }
    }

    public function getGalleryTravel($travel)
    {
       $travelImages = $travel->gallery;

       if (!is_array($travelImages) && !$travelImages) {
           return [];
       }
       return $travelImages;
    }
}
