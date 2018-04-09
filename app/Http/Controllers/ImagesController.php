<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Image;

class ImagesController extends Controller
{
    public function get(Request $request, $filename)
    {
    	
    	//$base = $request->input('base');
    	//$overlay = $request->input('overlay');

    	if(!file_exist(storage_path('app/'.$filename)))
    	{
    		abort(404);
    	}

    	$baseImage = Image::make(storage_path('app/'.$filename));
    	$overlayImage = Image::make(storage_path('app/'.env('WATERMARK_IMAGE')));

    	$baseImage->insert($overlayImage, 'top-left', 50, 100);
    	return $baseImage->response('jpg');
    }
}
