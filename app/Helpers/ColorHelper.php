<?php

namespace App\Helpers;

class ColorHelper {

    public function getColorOptions($selected_id = null)
    {
        $rows = \DB::table('colors')->orderBy('id', 'desc')->get();

        $options = '';

        foreach ($rows as $row) {

            $selected = '';

            if ($row->id === $selected_id) {
                $selected = 'selected';
            }
            
            $options .= '<option value="'. $row->id. '" data-slug="'.$row->slug.'" '.$selected.'>'. $row->name. '</option>';
        }

        return $options;
    }


    public function getColorName($id)
    {
        $row = \DB::table('colors')->where('id', $id)->first();
        return $row->name ?? null;
    }
}