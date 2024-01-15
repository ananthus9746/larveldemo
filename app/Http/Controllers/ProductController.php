<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;
use App\Models\SubCategory;
use App\Models\Color;

class ProductController extends Controller 
{
    
    public function index(Request $request, $category_slug = 0, $sub_category_slug = 0, $color_slug = 0) 
    {
        $data = [];

        $data['title'] = "Product";

        $products = Product::where('page_id', 1)->orderBy('id', 'desc');

        if ($category_slug) {
            $category = Category::where('slug', $category_slug)->first();
            
            $products->where('category_id', $category->id);

            $data['category_id'] = $category->id;
        }

        if ($sub_category_slug) {
            $sub_category = SubCategory::where('slug', $sub_category_slug)->first();
            
            $products->where('sub_category_id', $sub_category->id);

            $data['sub_category_id'] = $sub_category->id;
        }

        if ($color_slug) {
            $color = Color::where('slug', $color_slug)->first();
            
            $products->where('color_id', $color->id);

            $data['color_id'] = $color->id;
        }

        $data['products'] = $products->paginate(20);

        return view('frontend.product', $data);
    }

    public function single_product($slug)
    
    {
        $data = [];

        $data['product'] = Product::where('slug', $slug)->first();

        return view('frontend.single-product', $data);
    }

    public function get_products(Request $request)
    
    {
        
        $category_id = $request->category_id;
        $sub_category_id = $request->sub_category_id;
        $color_id = $request->color_id;

        $products = Product::where('page_id', 1)->select(['slug', 'name', 'images'])->orderBy('id', 'desc');

        if (!empty($category_id)) {
            $products->where('category_id', $category_id);
        }

        if (!empty($sub_category_id)) {
            $products->where('sub_category_id', $sub_category_id);
        }

        if (!empty($color_id)) {
            $products->where('color_id', $color_id);
        }

        $products = $products->get();



        return response()->json(['status'=>'success', 'products'=> $products]);
        
    }

}
