<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;

class SubCategory extends Model
{
    use Sluggable;

    protected $guarded = [];
    
    protected $fillable = ['category_id', 'name'];

    static function get_rows($limit, $skip, $search_by, $search_text)
    {
        $rows = self::selectRaw("ROW_NUMBER() OVER(ORDER BY sub_categories.id) AS sr, sub_categories.id, categories.name AS cat_name, sub_categories.name AS sub_cat_name")->orderBy('categories.id', 'DESC')->offset($skip)->limit($limit);

        if (!empty($search_by) && !empty($search_text)) {
            $rows->where($search_by,'like','%'.$search_text.'%');
        }
        
        $rows->leftJoin('categories', 'sub_categories.category_id', '=', 'categories.id');

        return $rows->get();
    }
    /**
     * Return the sluggable configuration array for this model.
     *
     * @return array
     */
    public function sluggable()
    {
        return [
            'slug' => [
                'source' => 'name'
            ]
        ];
    }
}
