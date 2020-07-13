<?php

namespace Modules\Product\Models;

use Illuminate\Database\Eloquent\Model;

/**
 *
 * @property int $id
 * @property int $model_id
 * @property int $relatable_id
 * @property string $relatable_type
 */
class ProductValueRelatables extends Model
{
    const TABLE_NAME = 'product_value_relatables';

    /**
     * @var string
     */
    protected $table = self::TABLE_NAME;

    /**
     * @var array
     */
    protected $fillable = [
        'product_value_relation_id',
        'relatable_id',
        'relatable_type',
    ];

    protected $with = [
        'relatable',
    ];

    public function relatable()
    {
        return $this->morphTo();
    }
}
