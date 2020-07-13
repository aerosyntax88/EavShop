<?php

namespace Modules\Product\Models;

use Illuminate\Database\Eloquent\Model;

/**
 *
 * @property int $id
 * @property string $label
 */
class ProductAttribute extends Model
{
    const TABLE_NAME = 'product_attribute';

    const FIELD_LABEL = 'label';
    const FIELD_DISPLAY_NAME = 'display_name';

    const ATTRIBUTE_SIZE = 1;
    const ATTRIBUTE_RESOLUTION_WIDTH = 2;
    const ATTRIBUTE_RESOLUTION_HEIGHT = 3;
    const ATTRIBUTE_BRAND = 4;
    const ATTRIBUTE_DISCOUNTED_PRICE = 5;
    const ATTRIBUTE_DESCRIPTION = 6;

    /**
     * @var string
     */
    protected $table = self::TABLE_NAME;

    /**
     * @var array
     */
    protected $fillable = [
        'label',
        'display_name',
    ];

    public function textValues()
    {
        return $this->hasMany(ProductValueText::class, 'attribute_id');
    }

    public function integerValues()
    {
        return $this->hasMany(ProductValueInteger::class, 'attribute_id');
    }
}
