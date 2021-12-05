<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PhotoGallery;

class PhotoGalleryController extends Controller
{


    /**
     * Listing Of images gallery
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
    	$images = PhotoGallery::get();
    	return view('photogallery',compact('images'));
    }


    /**
     * Upload image function
     *
     * @return \Illuminate\Http\Response
     */
    public function upload(Request $request)
    {
    	$this->validate($request, [
    		'title' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);


        $input['image'] = time().'.'.$request->image->getClientOriginalExtension();
        $request->image->move(public_path('images'), $input['image']);


        $input['title'] = $request->title;
        $input['creator'] = $request->creator;
        PhotoGallery::create($input);


    	return back()
    		->with('success','Image Uploaded successfully.');
    }


    /**
     * Remove Image function
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
    	PhotoGallery::find($id)->delete();
    	return back()
    		->with('success','Image removed successfully.');	
    }
}