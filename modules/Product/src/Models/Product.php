<?php

namespace Modules\Product\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 *
 * @property int $id
 * @property string $name
 * @property string $price
 *
 * @property Carbon $created_at
 * @property Carbon $updated_at
 */
class Product extends Model
{
    const TABLE_NAME = 'product';

    /**
     * @var string
     */
    protected $table = self::TABLE_NAME;

    /**
     * @var array
     */
    protected $fillable = [
        'name',
        'price',
    ];

    protected $with = [
        'textValues',
        'integerValues',
        'relationValues',
    ];

    public function textValues()
    {
        return $this->hasMany(ProductValueText::class, 'model_id');
    }

    public function integerValues()
    {
        return $this->hasMany(ProductValueInteger::class, 'model_id');
    }

    public function relationValues()
    {
        return $this->hasMany(ProductValueRelation::class, 'model_id');
    }
}
