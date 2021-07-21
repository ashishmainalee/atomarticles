<?php

namespace App\Http\Controllers\Backend;

use App\Models\Gallery;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class GalleryController extends Controller
{
    public function index()
    {
        $gallery = Gallery::latest()->paginate(18);
        return view('backend.gallery.index')->with('gallery', $gallery);
    }

    public function manage()
    {
        $gallery = Gallery::latest()->paginate(6);
        return view('backend.gallery.manage')->with('gallery', $gallery);
    }

    public function create()
    {
        return view('backend.gallery.create');
    }

    public function store(Request $request)
    {
       $this -> validate($request, [
            'title'   => 'required|max:250',
            'image'   => 'required|image|mimes:png,jpg,jpeg'
       ]);

       $input = $request->only(['title', 'is_featured', 'image']);

       if ($input['is_featured'] ?? '') {
           $input['is_featured'] = 1;
       } else {
           $input['is_featured'] = 0;
       }

       $image = $request->file('image');
       if($image) {
            $input['image'] = uploadImage($image, 'gallery', 2500, 2500);
       }

       $result = Gallery::create($input);

       if($result) {
            session()->flash('success', 'Gallery Image uploaded Successfully!');
        } else {
            session()->flash('error', 'Something went wrong.');
        }

        return redirect() -> route('backend.gallery');


    }

    public function edit($id)
    {
        $image = Gallery::findOrFail($id);
        return view('backend.gallery.create')->with('gallery', $image);
    }

    public function update(Request $request, $id)
    {
        $gallery = Gallery::findOrFail($id);

        $this -> validate($request, [
            'title'   => 'required|max:250',
            'image'   => 'image|mimes:png,jpg,jpeg'
       ]);

       $input = $request->only(['title', 'is_featured', 'image']);

       if ($input['is_featured'] ?? '') {
           $input['is_featured'] = 1;
       } else {
           $input['is_featured'] = 0;
       }

       $image = $request->file('image');
       $input['image'] = updateNewImageOrKeepOld($image, $gallery->image,'gallery', 2500, 2500);


       $result = $gallery->update($input);

       if($result) {
            session()->flash('success', 'Gallery Image updated Successfully!');
        } else {
            session()->flash('error', 'Something went wrong.');
        }

        return redirect() -> route('backend.gallery.manage');
    }

    public function destroy($id)
    {
        $image = Gallery::findOrFail($id);
        $result = $image->delete();

         if($result) {
            session()->flash('success', 'Gallery Image Deleted permanently!');
         } else {
            session()->flash('error', 'Something went wrong.');
         }

         return redirect() -> route('backend.gallery.manage') ;

    }

}
