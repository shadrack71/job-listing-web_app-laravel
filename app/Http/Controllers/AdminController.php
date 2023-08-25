<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Listing;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AdminController extends Controller
{
   

      public function index(){
         $users = User::all();
          $listings  = Listing::latest()->paginate(10);

          $listingsArray = $listings->toArray();
        
         $listingsLink = $listings -> links();

      

          $userData = [
            'users' => $users,
            'listings' => $listingsArray['data'],
            'listingsLink' => $listingsLink

          ];
            return view('admin.index',['userData' => $userData]);
     }
     public function viewUser(String  $id) {
        $user_m = User::find($id);
        $userListings = $user_m -> listing;
        $user_data_Listings =[
          'user_data'=> $user_m,
          'user_listings'=>$userListings
        ];
        return view('admin.user',['user_data_Listings' => $user_data_Listings]);

     }
     public function destroy(String $userId){
      if(auth()->user()->role == 'admin'){
        $user_id = User::find($userId);
        $user_id ->delete();
        return back();
            
        }
        return  abort(403,'unauthorized');

     }
}