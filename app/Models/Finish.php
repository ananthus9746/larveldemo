<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;

class Finish extends Model
{
    use Sluggable;

    protected $guarded = [];
    
    protected $fillable = ['name'];

    static function get_rows($limit, $skip, $search_by, $search_text)
    {
        $rows = self::selectRaw("ROW_NUMBER() OVER(ORDER BY id) AS sr, id, name")->orderBy('id', 'DESC')->offset($skip)->limit($limit);

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
