<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\PostComment;

class BlogController extends Controller
{
    public function index(Request $request)
    {
        $data = [];

        $posts = Post::where('published_at', '!=', null);
        if ($request->s) {
            $posts = $posts->where('title', 'LIKE', '%'.$request->s.'%');
        }
        $blogPosts = $posts->orderBy('id','desc')->paginate(10);
        return view('frontend.blog')->withBlogPosts($blogPosts)->withTotalBlogPosts(Post::where('published_at', '!=', null)->count());
    }
    public function single_post($slug)
    {       
        $data = [];
        if (Post::where('slug', $slug)->count() == 0) {
            abort(404);
        }
        $data['post'] = Post::where('slug', $slug)->first();
        $data['post']->view_count += 1;
        $data['post']->save();
        $data['post_comments'] = PostComment::where('post_id', $data['post']['id'])->where('parent_id', '=', null)->orderBy('id', 'DESC')->get()->all();
        $data['total_comments'] = PostComment::where('post_id', $data['post']['id'])->get()->count();
        return view('frontend.blog-single-post', $data);
    }
}
