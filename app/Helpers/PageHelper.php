<?php

namespace App\Helpers;

class PageHelper {

    public function getPageOptions($selected_id = null)
    {
        $rows = \DB::table('pages')->orderBy('id', 'desc')->get();

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


    public function getPageName($id)
    {
        $row = \DB::table('pages')->where('id', $id)->first();
        return $row->name ?? null;
    }
}