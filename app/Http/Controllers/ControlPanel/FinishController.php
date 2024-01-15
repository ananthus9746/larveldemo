<?php

namespace App\Http\Controllers\ControlPanel;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Finish;
use App\Http\Requests\StoreFinishRequest;
use App\Http\Requests\UpdateFinishRequest;

class FinishController extends Controller
{

    public function index()
    {
        $data = [];

        $data['title'] = "Finishes";

        return view('control-panel.finish');
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

        $rows = Finish::get_rows($limit, $skip, $search_by, $search_text);
        $total_category = Finish::count();

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
     * @param  \App\Http\Requests\StoreFinishRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreFinishRequest $request)
    {
        if (Finish::create($request->all())) {
            return response()->json(['status' => 'success', 'msg' => 'Finish Created Successfully'], 200);
        } else {
            return response()->json(['status' => 'error', 'msg' => 'Finish Failed to Create'], 400);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Finish  $category
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return Finish::find($id);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Finish  $category
     * @return \Illuminate\Http\Response
     */
    public function edit(Finish $category)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateFinishRequest  $request
     * @param  \App\Models\Finish  $category
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $category = new Finish;

        $result = $category::find($request->id)->fill($request->all())->save();
        if ($result) {
            return response()->json(['status' => 'success', 'msg' => 'Finish Updated Successfully'], 200);
        } else {
            return response()->json(['status' => 'error', 'msg' => 'Finish Failed to Update'], 400);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Finish  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if (Finish::find($id)->delete()) {
            return response()->json(['status' => 'success', 'msg' => 'Finish Deleted Successfully'], 200);
        } else {
            return response()->json(['status' => 'error', 'msg' => 'Finish Failed to Delete'], 400);
        }
    }
}
