<?php

namespace Modules\Product\Models;

use Illuminate\Database\Eloquent\Model;

/**
 *
 * @property int $id
 * @property string $value
 */
class ResolutionWidth extends Model
{
    const TABLE_NAME = 'resolution_width';

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
