<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Blog;
use Illuminate\Support\Facades\Auth;

class BlogController extends Controller
{
   
    public function showBlogCreateForm()
    {
        $pageTitle='Blogger - Create Blog';
        return view('user.blog.createBlog',compact('pageTitle'));
    }

    public function store(Request $req){

        $req->validate([
            'title' => 'required|string|max:255',
            'category' => 'required|in:tech,lifestyle,travel,food,education',
            'cover_img' => 'required|image|mimes:jpg,jpeg,png|max:2048',
            'description' => 'required|string',
        ], [
            'title.required' => 'Blog title is required',
            'title.string' => 'Title must be a valid string',
            'title.max' => 'Title can’t exceed 255 characters',
        
            'category.required' => 'Please select a category',
            'category.in' => 'Selected category is invalid',
        
            'cover_img.required' => 'Cover image is required',
            'cover_img.image' => 'The file must be an image',
            'cover_img.mimes' => 'Only JPG, JPEG, PNG formats are allowed',
            'cover_img.max' => 'Image size must be under 2MB',
        
            'description.required' => 'Blog content is required',
            'description.string' => 'Content must be a valid text',
        ]);
        

        $blog = new Blog();
        $blog->user_id = auth()->id();
        $blog->title = $req->title;
        $blog->category = $req->category;
        $blog->description = $req->description;
        $blog->author_name=Auth::user()->username;

        if ($req->hasFile('cover_img')) {
            $file = $req->file('cover_img');
            $filename = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('uploads/cover_img'), $filename);
            $blog->cover_img = 'uploads/cover_img/' . $filename;
        }

        $blog->save();


        return redirect('/')->with('success','Blog Created Succesfully');

    }


    public function showBlog($id)
    {
        $pageTitle='Blogger - Your Blog';

        $blog=Blog::find($id);
        return view('user.blog.showBlog',compact('blog','pageTitle'));
    }

   

}
