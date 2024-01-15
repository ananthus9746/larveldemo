<?php

namespace App\Helpers;

class CategoryHelper {

    public function getCategoryOptions($selected_id = null)
    {
        $rows = \DB::table('categories')->orderBy('name', 'asc')->get();

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

    public function getCategoryName($id)
    {
        $row = \DB::table('categories')->where('id', $id)->first();
        return $row->name ?? null;
    }

}