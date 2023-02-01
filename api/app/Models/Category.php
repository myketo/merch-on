<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'category';

    public static array $rules = [
        'name' => 'required',
        'parent_id' => 'nullable|exists:category,id',
    ];

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'parent_id',
    ];

    /**
     * Get all the products for the category.
     */
    public function products(): \Illuminate\Database\Eloquent\Relations\BelongsToMany
    {
        return $this->belongsToMany(Product::class, 'product_category');
    }

    public static function breadcrumbs(int $id)
    {
        $breadcrumbs = [];

        $category = self::findOrFail($id);
        $breadcrumbs[] = [
            'id' => $id,
            'name' => $category->name,
        ];

        while ($category->parent_id) {
            $category = self::findOrFail($category->parent_id);
            $breadcrumbs[] = [
                'id' => $category->id,
                'name' => $category->name,
            ];
        }

        return array_reverse($breadcrumbs);
    }

    public static function getAllChildrenIds(int $id): array
    {
        $childrenIds = [
            $id,
        ];

        $childCategories = self::query()
            ->select(['id'])
            ->where('parent_id', '=', $id)
            ->get()
            ->toArray();
        if ($childCategories) {
            $childrenIds = array_merge($childrenIds, array_column($childCategories, 'id'));

            $childChildCategories = self::query()
                ->select(['id'])
                ->whereIn('parent_id', array_column($childCategories, 'id'))
                ->get()
                ->toArray();
            if ($childChildCategories) {
                $childrenIds = array_merge($childrenIds, array_column($childChildCategories, 'id'));
            }
        }

        return $childrenIds;
    }
}
