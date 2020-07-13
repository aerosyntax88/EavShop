<?php

namespace Modules\Product\Models;

use Illuminate\Database\Eloquent\Model;

/**
 *
 * @property int $id
 * @property int $model_id
 * @property int $attribute_id
 * @property int $value
 */
class ProductValueInteger extends Model
{
    const TABLE_NAME = 'product_value_integer';

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
        'value',
    ];

    protected $with = [
        'attribute',
    ];

    public function attribute()
    {
        return $this->belongsTo(ProductAttribute::class, 'attribute_id');
    }
}
