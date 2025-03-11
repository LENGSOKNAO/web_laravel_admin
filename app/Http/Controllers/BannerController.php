<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Banner;
use Illuminate\Support\Facades\Storage;

class BannerController extends Controller
{
    public function index() {
        $banners = Banner::all();
        return view('banner.index', compact('banners'));
    }

    public function create() {
        return view('banner.create');
    }

    public function store(Request $request) {
        $banners = $request->validate([
            'banner_name' => 'required|string|max:256',
            'banner_description' => 'nullable|string',
            'banner_image' => 'required|image',
            'banner_small_image' => 'nullable|image',
            'banner_is_enable' => 'boolean',
            'banner_link' => 'nullable|string'
        ]);

        $image = $request->file('banner_image')->store('Banners', 'public');
        $image_small = $request->file('banner_small_image') ? $request->file('banner_small_image')->store('Banners', 'public') : null;

        Banner::create([
           'banner_name' => $request->banner_name,
           'banner_description' => $request->banner_description,
           'banner_image' => $image,
           'banner_small_image' => $image_small,
           'banner_is_enable' => $request->banner_is_enable ?? 0,
           'banner_link' => $request->banner_link ?? null
        ]);

        return redirect()->route('banner.index')->with('success', 'Banner created successfully!');
    }

    public function edit(Banner $banner) {
    
        return view('banner.edit', compact('banner'));
    }

    public function update(Request $request, Banner $banner) {
        $request->validate([
            'banner_name' => 'required|string|max:256',
            'banner_description' => 'nullable|string',
            'banner_image' => 'nullable|image',
            'banner_small_image' => 'nullable|image',
            'banner_is_enable' => 'boolean',
            'banner_link' => 'nullable|string'
        ]);
    
        // Update images if new ones are uploaded
        if ($request->hasFile('banner_image')) {
            // Delete old image
            if ($banner->banner_image) {
                Storage::disk('public')->delete($banner->banner_image);
            }
            // Store new image
            $banner->banner_image = $request->file('banner_image')->store('Banners', 'public');
        }
    
        if ($request->hasFile('banner_small_image')) {
            // Delete old small image
            if ($banner->banner_small_image) {
                Storage::disk('public')->delete($banner->banner_small_image);
            }
            // Store new small image
            $banner->banner_small_image = $request->file('banner_small_image')->store('Banners', 'public');
        }
    
        // Update banner details
        $banner->update([
            'banner_name' => $request->banner_name,
            'banner_description' => $request->banner_description,
            'banner_image' => $banner->banner_image,
            'banner_small_image' => $banner->banner_small_image,
            'banner_is_enable' => $request->banner_is_enable ?? 0,
            'banner_link' => $request->banner_link ?? null
        ]);
    
        return redirect()->route('banner.index')->with('success', 'Banner updated successfully!');
    }
    

    public function destroy( Banner $banner) {
    
        $banner->delete();

        return redirect()->route('banner.index')->with('success', 'Banner deleted successfully!');
    }
}
