<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;

class Product extends Model 
{
    use Sluggable;

    protected $guarded = [];
    
    protected $fillable = [
        'name',
        'category_id',
        'sub_category_id',
        'finish_id',
        'color_id',
        'size_id',
        'description',
        'destination',
        'page_id',
        'youtube_url',
    ];

    static function get_rows($limit, $skip, $search_by, $search_text)
    {
        $rows = self::selectRaw("
            ROW_NUMBER() OVER(ORDER BY products.id) AS sr,
            products.id AS id,
            products.name AS product_name,
            categories.name AS category_name,
            sub_categories.name AS sub_category_name,
            finishes.name AS finish_name,
            colors.name AS color_name,
            pages.name AS page_name
        ")->orderBy('id', 'DESC')->offset($skip)->limit($limit);

        $rows->leftJoin('categories', 'categories.id', '=', 'products.category_id');
        $rows->leftJoin('sub_categories', 'sub_categories.id', '=', 'products.sub_category_id');
        $rows->leftJoin('finishes', 'finishes.id', '=', 'products.finish_id');
        $rows->leftJoin('colors', 'colors.id', '=', 'products.color_id');
        $rows->leftJoin('pages', 'pages.id', '=', 'products.page_id');

        if (!empty($search_by) && !empty($search_text)) {
            $rows = $rows->where($search_by,'like','%'.$search_text.'%');
        }

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
