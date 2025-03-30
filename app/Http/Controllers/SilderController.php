<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Slider;

class SilderController extends Controller
{
    public function slider(){
        $slider = Slider::all();
        return response()->json($slider);
    }
    
    public function men()
    {
        $slider = Slider::where('slide_category', 'like', '%men%')->paginate(10);
    
        return view('slider.index', compact('slider'));
    }
    public function index (){
        $slider = Slider::all();
        return view('slider.index', compact('slider'));
    }
    public function create(){
        return view('slider.create');
    }
    public function store(Request $request) {
        $slider = $request->validate([
            'slide_name' => 'required|string|max:266',
            'slide_brand' => 'nullable|string|max:100',
            'slide_category' => 'nullable|string|max:100',
            'slide_image' => 'required|image',
            'slide_small_image' => 'nullable|image',
            'slide_description' => 'nullable|string',
            'slide_is_enable' => 'boolean'
        ]);
    
        
        $image = $request->file('slide_image')->store('sliders', 'public');
    
        
        $image_small = null;
        if ($request->hasFile('slide_small_image')) {
            $image_small = $request->file('slide_small_image')->store('sliders', 'public');
        }
    
       
        Slider::create([
            'slide_name' => $request->slide_name,
            'slide_brand' => $request->slide_brand,
            'slide_category' => $request->slide_category,
            'slide_image' => $image,
            'slide_small_image' => $image_small,
            'slide_description' => $request->slide_description,
            'slide_is_enable' => $request->slide_is_enable
        ]);
    
        return redirect()->route('slider.index')->with('success', 'Slider created successfully!');
    }
    public function edit($id)
    {
        $slider = Slider::findOrFail($id);
        return view('slider.edit', compact('slider'));
    }
    public function update(Request $request, $id)
    {
        $slider = Slider::findOrFail($id);

        $request->validate([
            'slide_name' => 'required|string|max:266',
            'slide_brand' => 'nullable|string|max:100',
            'slide_category' => 'nullable|string|max:100',
            'slide_image' => 'nullable|image',
            'slide_small_image' => 'nullable|image ',
            'slide_description' => 'nullable|string',
            'slide_is_enable' => 'required|boolean'
        ]);

        // Handle Image Uploads
        if ($request->hasFile('slide_image')) {
            \Storage::delete('public/' . $slider->slide_image); // Delete old image
            $slider->slide_image = $request->file('slide_image')->store('sliders', 'public');
        }

        if ($request->hasFile('slide_small_image')) {
            \Storage::delete('public/' . $slider->slide_small_image); // Delete old small image
            $slider->slide_small_image = $request->file('slide_small_image')->store('sliders', 'public');
        }

        // Update Data
        $slider->update([
            'slide_name' => $request->slide_name,
            'slide_brand' => $request->slide_brand,
            'slide_category' => $request->slide_category,
            'slide_description' => $request->slide_description,
            'slide_is_enable' => $request->slide_is_enable,
        ]);

        return redirect()->route('slider.index')->with('success', 'Slider updated successfully.');
    }
    public function destroy(Slider $slider)
    {
        $slider->delete();

        return redirect()->route('slider.index')->with('success', 'Slider deleted successfully.');
    }


}
