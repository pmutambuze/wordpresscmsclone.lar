<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\Category;
use App\User;
use App\Tag;

class BlogController extends Controller
{
  protected $limit = 3;

  public function index()
  {
    $posts = Post::with('author', 'tags', 'category', 'comments')
  								->latestFirst()
  								->published()
  								->filter(request()->only(['term', 'year', 'month']))
  								->simplePaginate($this->limit);
    return view("blog.index", compact('posts'));
  }

  public function category(Category $category) {
    $categoryName = $category->title;

    $posts = $category->posts()
                      ->with('author', 'tags', 'comments')
                      ->latestFirst()
                      ->published()
                      ->simplePaginate($this->limit);
    return view("blog.index", compact("posts", "categoryName"));
  }

  public function show(Post $post) {
		// update posts set view_count = view_count + 1 where id = ?
//    $post = Post::findOrFail($post->slug);

	  $post->increment('view_count');

		$postComments = $post->comments()->simplePaginate(3);

		return view("blog.show", compact('post', 'postComments'));
	}

  public function tag(Tag $tag) {
    $tagName = $tag->name;

    $posts = $tag->posts()
                  ->with('author', 'tags', 'comments')
                  ->latestFirst()
                  ->published()
                  ->simplePaginate($this->limit);
    return view("blog.index", compact("posts", "tagName"));
  }

  public function author(User $author) {
    $authorName = $author->name;

    $posts = $author->posts()
                    ->with('author', 'tags', 'comments')
                    ->latestFirst()
                    ->published()
                    ->simplePaginate($this->limit);
    return view("blog.index", compact("posts", "authorName"));
  }


}
