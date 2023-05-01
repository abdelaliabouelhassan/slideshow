<?php

namespace App\Http\Controllers;

use App\Models\Image;
use App\Models\Pages;
use Illuminate\Http\Request;

class PageController extends Controller
{
    /**
     * Display a listing of the resource.
     */
  
    public function index()
    {
        $pages = Pages::paginate(10);
        return view("pages.pages.index", compact("pages"));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view("pages.pages.create");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            "name" => "required|max:255",
            "slug" => "required|max:255|unique:pages,slug",
        ]);

        Pages::create($request->all());

        session()->flash("success", "Page created successfully");
       return redirect()->back();
    }

    /**
     * Display the specified resource.
     */
    public function show(string $slug)
    {
        $page = Pages::where("slug", $slug)->first();
        if ($page) {
            $images = Image::where('page_id',$page->id)->get('path');
            return view('welcome',compact('images'));
        } else {
            return abort(404);
        }
        
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Pages::findOrfail($id)->delete();
        session()->flash("success", "Page deleted successfully");
        return redirect()->back();
    }
}
