<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Listing extends Model
{
    use HasFactory;
      protected $fillable = [
        'title',
         'user_id',
        'logo',
        'tags',
        'company',
        'location',
        'email',
        'website',
        'description'

        
    ];
    public function scopeFilter($query,array $filter) {
      if(request('tag')){

        $searchTag = "%".request('tag')."%";
        $query -> where('tags','like',$searchTag);
      }else{
        $searchTag = "%".request('search')."%";
        $query -> where('title','like',$searchTag)
        ->orwhere('description','like',$searchTag)
        ->orwhere('tags','like',$searchTag)
        ->orwhere('company','like',$searchTag);
        
      }

    }

    public function user(){
       return $this->belongsTo(User::class,'user_id');
      
    }
}