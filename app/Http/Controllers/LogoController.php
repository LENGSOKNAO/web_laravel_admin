<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Logo;

class LogoController extends Controller
{
    //  show data
    public function index (){
        $logos = Logo::all();
        return view('logo.index', compact('logos'));
    }
    // create
    public function create(){
        return view('logo.create');
    }
    public function store(Request $request){


        $data = $request->validate([
            'logo_image' => 'required|image',
            'logo_is_enable' => 'nullable|boolean'
        ]);

        $image = $request->file('logo_image')->store('Logos', 'public');

        Logo::create([
            'logo_image' => $image,
            'logo_is_enable' => $request->logo_is_enable ?? 0
        ]);

        return redirect()->route('logo.index')->with('Created !!!!');

    }
    // edit 
    public function edit(Logo $logo){
        return view('logo.edit', compact('logo'));
    }

    public function update(Request $request, Logo $logo){

        $data = $request->validate([
            'logo_image' => 'nullable|image',
            'logo_is_enable' => 'nullable|boolean'
        ]);

        $data['logo_is_enable'] = $request->has('logo_is_enable') ?? 0;

        if($request->hasFile('logo_image')){
            $data['logo_image'] = $request->file('logo_image')->store('Logos', 'public');
        }

        $logo->update($data);

        return redirect()->route('logo.index')->with('Updated !!!!');

    }

    // delete

    public function destroy (Logo $logo){
        $logo->delete();
        
        return redirect()->route('logo.index')->with('Deleted !!!!');

    }
}
