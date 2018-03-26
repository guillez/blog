<?php

namespace App\Http\Controllers\Web;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Post;
use App\Category;

class PageController extends Controller
{
    public function blog(){

    	$posts = Post::orderBy('id','DESC')->where('status','PUBLISHED')->paginate(3);

    	return view('web.posts', compact('posts'));

    }

    public function category($slug){
    	//devuelve solo el id
    	$category = Category::where('slug', $slug)->pluck('id')->first();
    	$posts = Post::where('category_id',$category)->orderBy('id','DESC')->where('status','PUBLISHED')->paginate(3);
    	return view('web.posts', compact('posts'));
    }

    public function tag($slug){

    	$posts = Post::whereHas('tags', function($query) use ($slug) {
    		$query->where('slug', $slug);
    	})
    	->orderBy('id','DESC')->where('status','PUBLISHED')->paginate(3);
    	
    	return view('web.posts', compact('posts'));
    }


    public function post($slug){
    	//devuelve un registro pero todos los campos del mismo
    	$post = Post::where('slug', $slug)->first();

    	return view('web.post', compact('post'));
    }
}
