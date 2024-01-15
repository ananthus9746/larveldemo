<?php

namespace App\Helpers;

class SizeHelper {

    public function getSizeOptions($selected_id = null)
    {
        $rows = \DB::table('sizes')->orderBy('id', 'desc')->get();

        $options = '';

        foreach ($rows as $row) {

            $selected = '';

            if ($row->id === $selected_id) {
                $selected = 'selected';
            }
            
            $options .= '<option value="'. $row->id. '" '.$selected.'>'. $row->name. '</option>';
        }

        return $options;
    }


    public function getSizeName($id)
    {
        $row = \DB::table('sizes')->where('id', $id)->first();
        return $row->name ?? null;
    }
}