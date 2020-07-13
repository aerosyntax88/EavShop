<?php

namespace Modules\Boundary\Request\Models;

use Modules\Boundary\Contracts\RequestModelInterface;

abstract class AbstractRequestModel implements RequestModelInterface
{
    /**
     * @return array
     */
    public function toArray(): array
    {
        return get_object_vars($this);
    }
}
