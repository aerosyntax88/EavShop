<?php

namespace Modules\Product\Models;

use Illuminate\Database\Eloquent\Model;

/**
 *
 * @property int $id
 * @property int $size
 */
class DisplaySize extends Model
{
    const TABLE_NAME = 'display_size';

    /**
     * @var string
     */
    protected $table = self::TABLE_NAME;

    /**
     * @var array
     */
    protected $fillable = [
        'size',
    ];

    public function relatesTo()
    {
        return $this->morphToMany(ProductValueRelation::class, 'relatable');
    }
}
