<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cookie;
use App\Models\Product;

class WhatsNewController extends Controller
{
    
    public function index()
    {
        $data = [];

        $posts = Product::where('page_id', 2)->orderBy('id', 'desc')->get();

        $data['posts'] = $posts;

        return view('frontend.whats-new', $data);
    }

    public function single_post($slug)
    {
        $data = [];

        $product = Product::where('slug', $slug)->first();

        $product->view_count = $product->view_count + 1;

        $product->save();

        $data['post'] = $product;

        return view('frontend.whats-new-single', $data);
    }

    public function like_post(Request $request)
    {
        $id = $request->id;

        $product = Product::where('id', $id)->first();

        if (!$product) return ['status' => 'error'];

        $product->like_count += 1;

        $product->save();

        // Cookie::queue(Cookie::make(''));

        return ['status' => 'success'];
    }

    public function dislike_post(Request $request)
    {
        $id = $request->id;

        $product = Product::where('id', $id)->first();

        if (!$product) return ['status' => 'error'];

        if ($product->like_count > 0) {
            $product->like_count -= 1;
        }

        $product->save();

        // Cookie::queue(Cookie::make(''));

        return ['status' => 'success'];
    }

}
