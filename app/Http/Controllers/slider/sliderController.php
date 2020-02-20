<?php

namespace App\Http\Controllers\slider;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\model\Slider;


class sliderController extends Controller
{   

    public function add_slider()
    {
        return view('Admin.slider.add_slider');
    }

    public function save_slider(Request $request)
    {
        // return $request->all();

         $image =$request->file('slider_image');
         $imageName =$image->getClientOriginalName();
         $directory ='slider_image/';
         $image->move($directory,$imageName);
         $slider = new slider();
         $slider->slider_title    = $request->slider_title;
         $slider->content         =$request->content;
         $slider->slider_image    = $directory.$imageName;
         $slider->status          =$request->status;
         $slider->save();

         return redirect('add-slider')->with('message','slider saved successfully!!');


    }
    public function manage_slider()
    {
        return view('Admin.slider.manage_slider',[
            'slider' => slider::all()
        ]);
    }

    public function slider_details($id)
    {
        return view('Admin.slider.slider_details',[
            'slider' => slider::find($id)

        ]);
    }

    public function delete_slider($id)
    {
        $slider = slider::find($id);
        if (file_exists($slider->slider_image)) {
            unlink($slider->slider_image);
        }
        $slider->delete();
        return redirect('manage-slider')->with('message','slider deleted sucessfully!!');
    }

    public function edit_slider($id)
    {
        return view('Admin.slider.edit_slider',[
            'slider' => slider::find($id)
        ]);
    }

    public function update_slider(Request $request)
    {
       slider::updatesliderinfo($request);
       return redirect('manage-slider')->with('message','slider updated successfully!!');

    }
}
