<?php

namespace App\Http\Controllers\ControlPanel;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\SubCategory;
use App\Http\Requests\StoreCategoryRequest;
use App\Http\Requests\UpdateCategoryRequest;

class SubCategoryController extends Controller
{

    public function index()
    {
        $data = [];

        $data['title'] = "Sub Categories";

        return view('control-panel.sub-category');
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

        $rows = SubCategory::get_rows($limit, $skip, $search_by, $search_text);
        $total_category = SubCategory::count();

        $records = [];

        foreach ($rows as $row) {

            $records[] = '
                <tr data-id="' . $row['id'] . '">
                    <td>' . $row['sr'] . '</td>
                    <td>' . $row['cat_name'] . '</td>
                    <td>' . $row['sub_cat_name'] . '</td>
                    <td class="text-md-start text-center">
                        <i class="fal px-2 fa-pencil edit_row auto_load_data" data-bs-toggle="modal" data-bs-target="#editModal"></i>
                        <i class="fas px-2 fa-trash delete_row" data-bs-toggle="modal" data-bs-target="#delModal"></i>
                    </td>
                </tr>';
        }

        return response()->json(['records' => $records, 'total' => $total_category], 200);
    }


    public function get_options(Request $request)
    {
        $category_id = $request->category_id;

        $options = '';

        $sub_categories = SubCategory::where('category_id', $category_id)->get();

        foreach ($sub_categories as $category) {
            $options .= "<option value='".$category->id."' data-slug='".$category->slug."'>".$category->name."</option>";
        }

        return response()->json(['options'=>$options], 200);
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
     * @param  \App\Http\Requests\StoreCategoryRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreCategoryRequest $request)
    {
        if (SubCategory::create($request->all())) {
            return response()->json(['status' => 'success', 'msg' => 'Brand Created Successfully'], 200);
        } else {
            return response()->json(['status' => 'error', 'msg' => 'Brand Failed to Create'], 400);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\SubCategory  $sub_category
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return SubCategory::find($id);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\SubCategory  $sub_category
     * @return \Illuminate\Http\Response
     */
    public function edit(SubCategory $sub_category)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateCategoryRequest  $request
     * @param  \App\Models\SubCategory  $sub_category
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $sub_category = new SubCategory;

        $result = $sub_category::find($request->id)->fill($request->all())->save();
        if ($result) {
            return response()->json(['status' => 'success', 'msg' => 'Brand Updated Successfully'], 200);
        } else {
            return response()->json(['status' => 'error', 'msg' => 'Brand Failed to Update'], 400);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\SubCategory  $sub_category
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if (SubCategory::find($id)->delete()) {
            return response()->json(['status' => 'success', 'msg' => 'Brand Deleted Successfully'], 200);
        } else {
            return response()->json(['status' => 'error', 'msg' => 'Brand Failed to Delete'], 400);
        }
    }
}
