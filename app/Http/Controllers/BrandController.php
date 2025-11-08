<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Brand;
class BrandController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $brands =Brand::all();
        return view('backend.brand.list',compact('brands'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('backend.brand.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'brandName' => 'required|min:3',
        ]);

        $brandName = $request->brandName;

        $brand = new Brand();
        $brand->name =$request->brandName;
        $brand->save();

        return redirect()->route('brands.index')->with('success', 'Brand created successfully.');
        
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $brand =Brand::find($id);
         return view('backend.brand.edit',compact('brand'));

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'brandName' => 'required|min:3',
        ]);
        
        $brand = Brand::find($id);
        $brand->name =$request->brandName;
        $brand->save();

        return redirect()->route('brands.index')->with('success', 'Brand updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $brand =Brand::find($id);
        $brand->delete();
        return redirect()->route('brands.index');
    }
}
