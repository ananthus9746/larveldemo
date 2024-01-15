<?php

namespace App\Helpers;

class FinishHelper {

    public function getFinishOptions($selected_id = null)
    {
        $rows = \DB::table('finishes')->orderBy('id', 'desc')->get();

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

    public function getFinishName($id)
    {
        $row = \DB::table('finishes')->where('id', $id)->first();
        return $row->name ?? null;
    }
}