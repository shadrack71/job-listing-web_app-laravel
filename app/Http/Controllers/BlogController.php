<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    public function store(Request $request){
        $data = $request->validate([
            'title' => 'required',
            'description' => 'required',
            'published'=>'required'
        ]);
       Blog::create($data);
       return redirect(route('allBlog'));

    }
    public function show(){
        $data = Blog::all();
         return view ('allblog',['blogs' => $data]);
    }
    public function update(Blog $blog , Request $request){
        $validatedInput = $request->validate([
            'title' => 'required',
            'description' => 'required',
            'published'=>'nullable'
        ]);
        
        $blog->update($validatedInput);
        return redirect(route('allBlog',))->with('msg','blog updated successfully'); 
    }

    public function destroy(Blog $blog) {
        $blog->delete();
        return redirect(route('allBlog',))->with('msg','blog delete successfully');

    }
    //
}