<?php

namespace App\Http\Controllers;

use App\Models\Listing;
use Illuminate\Http\Request;


class ListingController extends Controller
{
     public function index(){
        if(request()->tag){
            $listings = Listing::latest()->filter(request(['tag']))->paginate(10);

          $listingsArray = $listings->toArray();
        
         $listingsLink = $listings -> links();

         $listingsData =[
          'listings' => $listingsArray['data'],
          'listingsLink' => $listingsLink
         ];
        
        return view('home', ['listings' =>  $listingsData]);

        }else if(request()->search){
        $listings = Listing::latest()->filter(request(['search']))->paginate(10);

        $listingsArray = $listings->toArray();
        
         $listingsLink = $listings -> links();

         $listingsData =[
          'listings' => $listingsArray['data'],
          'listingsLink' => $listingsLink
         ];
        
        return view('home', ['listings' =>  $listingsData]);

        }else{
        // $listings = Listing::latest()->get();
        $listings = Listing::latest()->paginate(10);
        $listingsArray = $listings->toArray();
        
        $listingsLink = $listings -> links();

         $listingsData =[
          'listings' => $listingsArray['data'],
          'listingsLink' => $listingsLink
         ];
        
        return view('home', ['listings' =>  $listingsData]);
        }
     }

       public function show(String $id){
        $listing = Listing::find($id);
        return view('show', ['listing' => $listing]);
     }
      public function create(){
        return view('create');
     }
      public function manage(){
        $userListings =  auth()->user()->listing()->get();
       

        return view('manage',['listings' => $userListings]);

     }

     public function edit(Listing $listing){
          if( $listing->user_id == auth()->user()->id OR auth()->user()->role == 'admin' ){
              return view('updateGig',['listing' => $listing]);
            }
            return  abort(403,'unauthorized');
     }
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
            $validateData['user_id'] = auth()->user()->id;
            Listing::create($validateData);
            return redirect(route('create'))->with("msg","gig created successfully");

    }


     public function update(Listing $listing , Request $request){
        $user_listing_id = $listing->user_id;
        $user_id = auth()->user()->id;
        $role = auth()->user()->role;

      if( $user_id == $user_listing_id OR $role == 'admin' ){
        $validatedInputUpdate = $request->validate([
             'title' => 'required',
            'tags' => 'required',
            'company'=>'required',
            'location' => 'required',
            'email' => 'required|email',
            'website'=>'required',
            'description' => 'required'
        ]);

        // TODO:updating gig photo 
        
        $listing->update($validatedInputUpdate);
        return redirect(route('updateGig',['listing' => $listing]))->with('msg','blog updated successfully'); 
              
            }
            return  abort(403,'unauthorized');
     }
   public function destroy(Listing $listing ) {


        $user_listing_id = $listing->user_id;
        $user_id = auth()->user()->id;
        $role = auth()->user()->role;

      if( $user_id == $user_listing_id OR $role == 'admin' ){
        /*
        delete the gigs photo from the from file system

         if($listing->logo && Storage::disk('public')->exists($listing->logo)) {
            Storage::disk('public')->delete($listing->logo);
        }
        
        
        */

        $listing->delete();
        return redirect(route('index'))->with('msg','blog delete successfully');
         }
            return  abort(403,'unauthorized');
    }

     
}