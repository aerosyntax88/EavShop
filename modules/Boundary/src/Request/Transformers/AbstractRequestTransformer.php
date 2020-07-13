<?php

namespace Modules\Boundary\Request\Transformers;

use Modules\Boundary\Contracts\RequestModelInterface;
use Modules\Boundary\Contracts\RequestTransformerInterface;
use RequestInterface;

abstract class AbstractRequestTransformer implements RequestTransformerInterface
{
    /**
     * @return RequestModelInterface
     */
    abstract public function build(): RequestModelInterface;

    /**
     * @param RequestInterface $request
     * @return RequestTransformerInterface
     */
    public function httpTransform(RequestInterface $request): RequestTransformerInterface
    {
        $data = array_merge($request->getBody());
        return $this->transform($data);
    }

    /**
     * @param array $data
     * @return AbstractRequestTransformer
     */
    public function transform(array $data): RequestTransformerInterface
    {
        foreach ($data as $key => $value) {
            $methodName = 'set' . ucfirst($key);
            if (method_exists($this, $methodName)) {
                call_user_func([$this, $methodName], $value);
            }
        }
        return $this;
    }
}
