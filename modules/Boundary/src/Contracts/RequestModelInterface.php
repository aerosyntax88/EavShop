<?php

namespace Modules\Boundary\Contracts;

interface RequestModelInterface
{
    /**
     * @return array
     */
    public function toArray(): array;
}
