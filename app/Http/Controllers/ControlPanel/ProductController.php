<?php

namespace App\Http\Controllers\ControlPanel;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use Intervention\Image\ImageManager;
use Intervention\Image\ImageManagerStatic as Image;
use App\Http\Requests\StoreProductRequest;
use App\Http\Requests\UpdateProductRequest;
use Illuminate\Support\Facades\File;

class ProductController extends Controller
{

    public function index()
    {
        $data = [];

        $data['title'] = "Products";

        return view('control-panel.product');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function get_records(Request $request)
    {
        $limit = $request->limit;
        $skip = $request->skip;
        $search_text = $request->search_text;
        $search_by = $request->search_by;

        $rows = Product::get_rows($limit, $skip, $search_by, $search_text);
        $total_product = Product::count();

        $records = [];

        foreach ($rows as $row) {

            $records[] = '
                <tr data-id="' . $row['id'] . '">
                    <td>' . $row['sr'] . '</td>
                    <td>' . $row['product_name'] . '</td>
                    <td>' . $row['category_name'] . '</td>
                    <td>' . $row['sub_category_name'] . '</td>
                    <td>' . $row['finish_name'] . '</td>
                    <td>' . $row['color_name'] . '</td>
                    <td>' . $row['page_name'] . '</td>
                    <td class="text-md-start text-center">
                        <a href="'.url('control-panel/products/'.$row['id']).'"><i class="fal px-2 fa-pencil"></i></a>
                        <i class="fas px-2 fa-trash delete_row" data-bs-toggle="modal" data-bs-target="#delModal"></i>
                    </td>
                </tr>';
        }

        return response()->json(['records' => $records, 'total' => $total_product], 200);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreProductRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreProductRequest $request)
    {
        $images = [];
        
        if ($files = $request->file('images')) {

            foreach ($files as $file) {

                $random = \Illuminate\Support\Str::random(40);

                $lg_filename = $random . '.' . $file->getClientOriginalExtension();
                $sm_filename = $random . '-sm.' . $file->getClientOriginalExtension();

                $image_lg = Image::make($file->getRealPath());
                if ($image_lg->width() > 1000) {
                    $image_lg->resize(1000, null, function ($constraint) {
                        $constraint->aspectRatio();
                    });
                }
                
                $image_sm = Image::make($file->getRealPath());
                if ($image_sm->width() > 450) {
                    $image_sm->resize(450, null, function ($constraint) {
                        $constraint->aspectRatio();
                    });
                }


                $dir = public_path('uploads');
    
                if (!File::exists($dir)) {
                    File::makeDirectory($dir, 0755, true, true);
                } 

                $lg_img_file_path = public_path('uploads/'.$lg_filename); 

                $sm_img_file_path = public_path('uploads/'.$sm_filename); 

                $image_lg->save($lg_img_file_path);

                $image_sm->save($sm_img_file_path);

                $images[] = $lg_filename;

            }

        }
        $product = new Product;

        $product->name = $request->name;
        $product->category_id = $request->category_id;
        $product->sub_category_id = $request->sub_category_id;
        $product->finish_id = $request->finish_id;
        $product->color_id = $request->color_id;
        $product->size_id = $request->size_id;
        $product->description = $request->description;
        $product->destination = $request->destination;
        $product->page_id = $request->page_id;
        $product->youtube_url = $request->youtube_url;

        $product->images = json_encode($images);

        if ($product->save()) {
            return response()->json(['status' => 'success', 'msg' => 'Product Created Successfully'], 200);
        } else {
            return response()->json(['status' => 'error', 'msg' => 'Product Failed to Create'], 400);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data = [];

        $data['product'] = Product::find($id);

        return view('control-panel.product-edit', $data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateProductRequest  $request
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {

        $images = [];
        
        if ($files = $request->file('images')) {

            foreach ($files as $file) {

                $random = \Illuminate\Support\Str::random(40);

                $lg_filename = $random . '.' . $file->getClientOriginalExtension();
                $sm_filename = $random . '-sm.' . $file->getClientOriginalExtension();

                $image_lg = Image::make($file->getRealPath());
                if ($image_lg->width() > 1000) {
                    $image_lg->resize(1000, null, function ($constraint) {
                        $constraint->aspectRatio();
                    });
                }
                
                $image_sm = Image::make($file->getRealPath());
                if ($image_sm->width() > 450) {
                    $image_sm->resize(450, null, function ($constraint) {
                        $constraint->aspectRatio();
                    });
                }


                $dir = public_path('uploads');
    
                if (!File::exists($dir)) {
                    File::makeDirectory($dir, 0755, true, true);
                } 

                $lg_img_file_path = public_path('uploads/'.$lg_filename); 

                $sm_img_file_path = public_path('uploads/'.$sm_filename); 

                $image_lg->save($lg_img_file_path);

                $image_sm->save($sm_img_file_path);

                $images[] = $lg_filename;

            }

        }
        $product = Product::find($request->id);

        $product->name = $request->name;
        $product->category_id = $request->category_id;
        $product->sub_category_id = $request->sub_category_id;
        $product->finish_id = $request->finish_id;
        $product->color_id = $request->color_id;
        $product->size_id = $request->size_id;
        $product->description = $request->description;
        $product->destination = $request->destination;
        $product->page_id = $request->page_id;
        $product->youtube_url = $request->youtube_url;

        $product->images = json_encode($images);

        if ($product->save()) {
            return response()->json(['status' => 'success', 'msg' => 'Product Updated Successfully'], 200);
        } else {
            return response()->json(['status' => 'error', 'msg' => 'Product Failed to Update'], 400);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if (Product::find($id)->delete()) {
            return response()->json(['status' => 'success', 'msg' => 'Product Deleted Successfully'], 200);
        } else {
            return response()->json(['status' => 'error', 'msg' => 'Product Failed to Delete'], 400);
        }
    }
}
