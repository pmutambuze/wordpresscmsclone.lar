<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\Category;

class BlogController extends Controller
{
  protected $limit = 3;

  public function index()
  {
    $categories = Category::with(['posts' => function($query) {
      $query->published();
    }])->orderBy('title', 'asc')->get();
    $posts = Post::with('author', 'tags', 'category', 'comments')
  								->latestFirst()
  								->published()
  								->filter(request()->only(['term', 'year', 'month']))
  								->simplePaginate($this->limit);
    return view("blog.index", compact('posts', 'categories'));
  }

  public function category(Category $category) {
    $categories = Category::with(['posts' => function($query) {
      $query->published();
    }])->orderBy('title', 'asc')->get();
    $categoryName = $category->title;

    $posts = $category->posts()
                      ->with('author', 'tags', 'comments')
                      ->latestFirst()
                      ->published()
                      ->simplePaginate($this->limit);
    return view("blog.index", compact("posts", "categoryName", "categories"));
  }

  public function show(Post $post) {
		// update posts set view_count = view_count + 1 where id = ?
//    $post = Post::findOrFail($post->slug);

	  $post->increment('view_count');

		$postComments = $post->comments()->simplePaginate(3);

		return view("blog.show", compact('post', 'postComments'));
	}

}
