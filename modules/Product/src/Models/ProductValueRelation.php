<?php

namespace Modules\Product\Models;

use Illuminate\Database\Eloquent\Model;

/**
 *
 * @property int $id
 * @property int $model_id
 * @property int $attribute_id
 */
class ProductValueRelation extends Model
{
    const TABLE_NAME = 'product_value_relation';

    /**
     * @var string
     */
    protected $table = self::TABLE_NAME;

    /**
     * @var array
     */
    protected $fillable = [
        'model_id',
        'attribute_id',
    ];

    protected $with = [
        'brands',
        'sizes',
        'resolutionWidths',
        'resolutionHeights',
    ];

    public function brands()
    {
        return $this->morphedByMany(Brand::class, 'relatable', 'product_value_relatables');
    }

    public function sizes()
    {
        return $this->morphedByMany(DisplaySize::class, 'relatable', 'product_value_relatables');
    }

    public function resolutionWidths()
    {
        return $this->morphedByMany(ResolutionWidth::class, 'relatable', 'product_value_relatables');
    }

    public function resolutionHeights()
    {
        return $this->morphedByMany(ResolutionWidth::class, 'relatable', 'product_value_relatables');
    }


}
