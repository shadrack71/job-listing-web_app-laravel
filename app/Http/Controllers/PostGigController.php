<?php

namespace App\Http\Controllers;

use App\Models\Listing;
use App\Models\PostGigModel;
use Illuminate\Http\Request;

class PostGigController extends Controller
{
    public function store(Request $request){
        $validateData = $request->validate(
            [
            'title' => 'required',
            'tags' => 'required',
            'company'=>'required',
            'location' => 'required',
            'email' => 'required|email',
            'website'=>'required',
            'description' => 'required',
            ]
            );

            if($request->hasFile('logo')){
                $validateData['logo'] = $request->file('logo')->store('logos','public');
            }
            Listing::create($validateData);
            return redirect(route('create'))->with("msg","gig created successfully");

    }

       public function update(Listing $listing , Request $request){
        $validatedInputUpdate = $request->validate([
             'title' => 'required',
            'tags' => 'required',
            'company'=>'required',
            'location' => 'required',
            'email' => 'required|email',
            'website'=>'required',
            'description' => 'required'
        ]);
        
        $listing->update($validatedInputUpdate);
        return redirect(route('updateGig',['listing' => $listing]))->with('msg','blog updated successfully'); 
    }
   public function destroy(Listing $listing ) {
        $listing->delete();
        return redirect(route('index'))->with('msg','blog delete successfully');

    }



}