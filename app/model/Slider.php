<?php

namespace App\model;

use Illuminate\Database\Eloquent\Model;
use Image;

class Slider extends Model
{
    protected $fillable = ['slider_title','slider_image','content','status','trash','created_by'];

    // save slider related------------------------

    public static function savesliderinfo($request)
    {
            $image =$request->file('slider_image');
             $imageName =$image->getClientOriginalName();
             $directory ='slider_image/';
             // $image->move($directory,$imageName);
             $img = Image::make($image)->save($directory.$imageName)->resize(300, 200);
             $slider = new slider();
             $slider->slider_title    = $request->slider_title;
             $slider->content         =$request->content;
             $slider->slider_image    = $directory.$imageName;
             $slider->status          =$request->status;
             $slider->save();
    }

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

    // delete slider related ----------------------

    public static function deletesliderinfo($id)
    {
            $slider = slider::find($id);
            if (file_exists($slider->slider_image)) {
                unlink($slider->slider_image);
            }
            $slider->delete();
    }
}
