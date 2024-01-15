<?php

namespace App\Http\Controllers\ControlPanel;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Http\Requests\StoreCategoryRequest;
use App\Http\Requests\UpdateCategoryRequest;

class CategoryController extends Controller
{

    public function index()
    {
        $data = [];

        $data['title'] = "Categories";

        return view('control-panel.category');
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

        $rows = Category::get_rows($limit, $skip, $search_by, $search_text);
        $total_category = Category::count();

        $records = [];

        foreach ($rows as $row) {

            $records[] = '
                <tr data-id="' . $row['id'] . '">
                    <td>' . $row['sr'] . '</td>
                    <td>' . $row['name'] . '</td>
                    <td class="text-md-start text-center">
                        <i class="fal px-2 fa-pencil edit_row auto_load_data" data-bs-toggle="modal" data-bs-target="#editModal"></i>
                        <i class="fas px-2 fa-trash delete_row" data-bs-toggle="modal" data-bs-target="#delModal"></i>
                    </td>
                </tr>';
        }

        return response()->json(['records' => $records, 'total' => $total_category], 200);
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
        if (Category::create($request->all())) {
            return response()->json(['status' => 'success', 'msg' => 'Type Created Successfully'], 200);
        } else {
            return response()->json(['status' => 'error', 'msg' => 'Type Failed to Create'], 400);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return Category::find($id);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function edit(Category $category)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateCategoryRequest  $request
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $category = new Category;

        $result = $category::find($request->id)->fill($request->all())->save();
        if ($result) {
            return response()->json(['status' => 'success', 'msg' => 'Type Updated Successfully'], 200);
        } else {
            return response()->json(['status' => 'error', 'msg' => 'Type Failed to Update'], 400);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if (Category::find($id)->delete()) {
            return response()->json(['status' => 'success', 'msg' => 'Type Deleted Successfully'], 200);
        } else {
            return response()->json(['status' => 'error', 'msg' => 'Type Failed to Delete'], 400);
        }
    }
}
