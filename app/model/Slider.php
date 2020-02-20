<?php

namespace App\model;

use Illuminate\Database\Eloquent\Model;

class Slider extends Model
{
    protected $fillable = ['slider_title','slider_image','content','status','trash','created_by'];


    // update slider related-------------
    public static function updatesliderinfo($request)
    {
        $slider_image = $request->file('slider_image');
        if ($slider_image) 
        {
            $slider = slider::find($request->id);
            unlink($slider->slider_image);
            $imageName = $slider_image->getClientOriginalName();
            $directory ='slider_image/';
            $slider_image->move($directory,$imageName);
            $slider->slider_image = $directory.$imageName;
            $slider->slider_title = $request->slider_title;
            $slider->status       = $request->status;
            $slider->content      = $request->content;
            $slider->save();
           
        }
        
        else
        {    
            $slider = slider::find($request->id);
            $slider->slider_title = $request->slider_title;
            $slider->status       = $request->status;
            $slider->content      = $request->content;
            $slider->save();
        }
    }
}
