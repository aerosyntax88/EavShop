<?php

namespace Modules\Boundary\Contracts;

use RequestInterface;

interface RequestTransformerInterface
{
    /**
     * @param array $data
     * @return RequestTransformerInterface
     */
    public function transform(array $data): RequestTransformerInterface;

    /**
     * @param RequestInterface $request
     * @return RequestTransformerInterface
     */
    public function httpTransform(RequestInterface $request): RequestTransformerInterface;

    /**
     * @return RequestModelInterface
     */
    public function build(): RequestModelInterface;
}
