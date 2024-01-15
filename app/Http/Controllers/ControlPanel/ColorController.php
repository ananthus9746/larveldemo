<?php

namespace App\Http\Controllers\ControlPanel;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Color;
use App\Http\Requests\StoreColorRequest;
use App\Http\Requests\UpdateColorRequest;

class ColorController extends Controller
{

    public function index()
    {
        $data = [];

        $data['title'] = "Colors";

        return view('control-panel.color');
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

        $rows = Color::get_rows($limit, $skip, $search_by, $search_text);
        $total_color = Color::count();

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

        return response()->json(['records' => $records, 'total' => $total_color], 200);
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
     * @param  \App\Http\Requests\StoreColorRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreColorRequest $request)
    {
        if (Color::create($request->all())) {
            return response()->json(['status' => 'success', 'msg' => 'Color Created Successfully'], 200);
        } else {
            return response()->json(['status' => 'error', 'msg' => 'Color Failed to Create'], 400);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Color  $color
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return Color::find($id);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Color  $color
     * @return \Illuminate\Http\Response
     */
    public function edit(Color $color)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateColorRequest  $request
     * @param  \App\Models\Color  $color
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $color = new Color;

        $result = $color::find($request->id)->fill($request->all())->save();
        if ($result) {
            return response()->json(['status' => 'success', 'msg' => 'Color Updated Successfully'], 200);
        } else {
            return response()->json(['status' => 'error', 'msg' => 'Color Failed to Update'], 400);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Color  $color
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if (Color::find($id)->delete()) {
            return response()->json(['status' => 'success', 'msg' => 'Color Deleted Successfully'], 200);
        } else {
            return response()->json(['status' => 'error', 'msg' => 'Color Failed to Delete'], 400);
        }
    }
}
