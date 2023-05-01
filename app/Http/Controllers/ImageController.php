<?php

namespace App\Http\Controllers;

use App\Models\Image;
use App\Models\Pages;
use Illuminate\Http\Request;

class ImageController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function images($slug){
        $page = Pages::where('slug',$slug)->first();
        if($page){
            $images = Image::where('page_id',$page->id)->paginate(5);
            return view('pages.images.index',compact('images','slug'));
        }else{
            
           return abort(404);
        }
    }

    public function create($slug){
        return view('pages.images.create',compact('slug'));
    }

    public function store(Request $request,$slug){
        $request->validate([
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg',
        ]);
        $imageName = time() . '.' . $request->image->extension();

        $request->image->move(public_path('images'), $imageName);

       $page =  Pages::where('slug',$slug)->first();
        if($page){
            Image::create([
                'page_id' => $page->id,
                'path' => 'images/' . $imageName
            ]);
            session()->flash('success','Image added successfully');
        }else{
            session()->flash('error','Page not found');
        }
        return redirect()->back();
    }

    public function delete(Request $request){
        $request->validate([
            'id' => 'required|integer',
        ]);
        Image::findOrFail($request->id)->delete();

        session()->flash('success','Image deleted successfully');

        return redirect()->back();
    

    }
}
