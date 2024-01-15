<?php

namespace App\Helpers;

class SubCategoryHelper {

    public function getSubCategoryOptions($category_id = null, $selected_id = null)
    {
        $rows = \DB::table('sub_categories')->orderBy('name', 'asc');

        if (!is_null($category_id)) {
            $rows = $rows->where('category_id', $category_id);
        }

        $rows = $rows->get();

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
    
    public function getSubCategoryName($id)
    {
        $row = \DB::table('sub_categories')->where('id', $id)->first();
        return $row->name ?? null;
    }

}