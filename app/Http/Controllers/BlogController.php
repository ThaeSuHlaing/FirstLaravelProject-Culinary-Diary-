<?php

namespace App\Http\Controllers;
use App\Models\Blog;
use App\Models\User;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
class BlogController extends Controller
{
    public function index() 
    {
        //403 page redirect
        //$this->authorize('admin');
        //dd(Gate::allows('admin'));
        
        return view('blogs.index',
        [
            'blogs'=>Blog::latest()
                        ->filter(request(['search','category','username']))
                        ->paginate(6)
                        ->withQueryString()
            //'blogs'=>Blog::with('category','author')->get()
            //eager load, lazy loading, N+1 Problem Solve
            //To put the code outside of loop
        ]);
    }

    public function show(Blog $blog)
    {
        return view('blogs.show',[
            'blog'=>$blog,
            'randomBlogs'=>Blog::inRandomOrder()->take(3)->get()
        ]);
    }

    public function subscriptionHandler(Blog $blog)
    {
        if(User::find(auth()->id())->isSubscribed($blog))
        {
            $blog->unSubscribe();
        }
        else
        {
           $blog->subscribe();
        }
        return back();
    }
}