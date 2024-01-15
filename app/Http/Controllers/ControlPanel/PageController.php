<?php

namespace App\Http\Controllers\ControlPanel;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Page;
use App\Http\Requests\StorePageRequest;
use App\Http\Requests\UpdatePageRequest;

class PageController extends Controller
{

    public function index()
    {
        $data = [];

        $data['title'] = "Pages";

        return view('control-panel.page');
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

        $rows = Page::get_rows($limit, $skip, $search_by, $search_text);
        $total_page = Page::count();

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

        return response()->json(['records' => $records, 'total' => $total_page], 200);
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
     * @param  \App\Http\Requests\StorePageRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorePageRequest $request)
    {
        if (Page::create($request->all())) {
            return response()->json(['status' => 'success', 'msg' => 'Page Created Successfully'], 200);
        } else {
            return response()->json(['status' => 'error', 'msg' => 'Page Failed to Create'], 400);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Page  $page
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return Page::find($id);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Page  $page
     * @return \Illuminate\Http\Response
     */
    public function edit(Page $page)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdatePageRequest  $request
     * @param  \App\Models\Page  $page
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $page = new Page;

        $result = $page::find($request->id)->fill($request->all())->save();
        if ($result) {
            return response()->json(['status' => 'success', 'msg' => 'Page Updated Successfully'], 200);
        } else {
            return response()->json(['status' => 'error', 'msg' => 'Page Failed to Update'], 400);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Page  $page
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if (Page::find($id)->delete()) {
            return response()->json(['status' => 'success', 'msg' => 'Page Deleted Successfully'], 200);
        } else {
            return response()->json(['status' => 'error', 'msg' => 'Page Failed to Delete'], 400);
        }
    }
}
