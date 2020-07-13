<?php

namespace Modules\Product\Models;

use Illuminate\Database\Eloquent\Model;

/**
 *
 * @property int $id
 * @property int $model_id
 * @property int $attribute_id
 * @property string $value
 */
class ProductValueText extends Model
{
    const TABLE_NAME = 'product_value_text';

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
