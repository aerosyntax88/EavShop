<?php

namespace Modules\Product\Models;

use Illuminate\Database\Eloquent\Model;

/**
 *
 * @property int $id
 * @property string $name
 */
class Brand extends Model
{
    const TABLE_NAME = 'brand';

    /**
     * @var string
     */
    protected $table = self::TABLE_NAME;

    /**
     * @var array
     */
    protected $fillable = [
        'name',
    ];

    public function relatesTo()
    {
        return $this->morphToMany(ProductValueRelation::class, 'relatable');
    }
}
