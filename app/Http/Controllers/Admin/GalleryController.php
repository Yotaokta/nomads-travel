<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\Gallery;
use App\Models\TravelPackage;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\GalleryRequest;


class GalleryController extends Controller
{

    public function index()
    {
        $gallery = Gallery::with('travel_package')->get();
        return view('pages.admin.gallery..index', [
            'title' => 'Galeri Paket Travel',
            'galleries' => $gallery
        ]);
    }

    public function create()
    {
        $travel = TravelPackage::all();
        return view('pages.admin.gallery.create', [
            'title' => "Input Gambar Travel",
            'travels' => $travel
        ]);
    }


    public function store(GalleryRequest $request)
    {
        $gallery = $request->validated();
        $gallery['image'] = $request->file('image')->store(
            'assets/travel', 'public'
        );

        Gallery::create($gallery);
        return redirect()->route('galleries.index');
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
          $galleryData = Gallery::with(['travel_package'])->where('id', $id)->get(); //returnnya adalah collection
          foreach ($galleryData as  $gallery) {
              return view('pages.admin.gallery.edit', [
                 'title' => 'Update Travel ' . $gallery->travel_package->title,
                 'gallery' => $gallery
              ]);
          }
    }

    public function update(GalleryRequest $request, $id)
    {
        $travel = $request->validated();
         $travel['image'] = $request->file('image')->store(
            'assets/travel', 'public'
        );
        
        Gallery::where('id', $id)->update($travel);
        return redirect()->route('galleries.index');
    }

    public function destroy($id)
    {
        Gallery::where('id', $id)->delete();
        return redirect()->route('galleries.index');
    }
}
