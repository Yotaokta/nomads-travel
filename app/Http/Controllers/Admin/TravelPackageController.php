<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\TravelPackage;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\TravelPackageRequest;

class TravelPackageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $travels = TravelPackage::all();
        return view('pages.admin.travel-package.index', [
            'travels' => $travels,
            'title' => 'Paket Travel Data'
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.admin.travel-package.create', ['title' => 'Buat Paket Travel']);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(TravelPackageRequest $request)
    {
        $traveldata = $request->validated();
        $traveldata['slug'] = Str::slug($request['title']);
        TravelPackage::create($traveldata);
         return redirect()->route('travel-package.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $items = TravelPackage::where('id', $id)->firstorFail();
        return view('pages.admin.travel-package.edit', [
            'item' => $items,
            'title' => 'Update DataTravel'
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(TravelPackageRequest $request, $id)
    {   
        $traveldata = $request->validated();
        $traveldata['slug'] = Str::slug($traveldata['title']);

        TravelPackage::where('id', $id)->update($traveldata);
         return redirect()->route('travel-package.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        TravelPackage::where('id', $id)->delete();
        return redirect()->route('travel-package.index');
    }
}
