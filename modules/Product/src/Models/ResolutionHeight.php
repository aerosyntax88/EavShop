<?php

namespace Modules\Product\Models;

use Illuminate\Database\Eloquent\Model;

/**
 *
 * @property int $id
 * @property string $value
 */
class ResolutionHeight extends Model
{
    const TABLE_NAME = 'resolution_height';

    /**
     * @var string
     */
    protected $table = self::TABLE_NAME;

    /**
     * @var array
     */
    protected $fillable = [
        'value',
    ];

    public function relatesTo()
    {
        return $this->morphToMany(ProductValueRelation::class, 'relatable');
    }
}
