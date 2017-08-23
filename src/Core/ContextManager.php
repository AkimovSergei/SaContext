<?php
/**
 * Created by PhpStorm.
 * User: sergii
 * Date: 20.04.17
 * Time: 09:05
 */

namespace Sa\Context\Core;

use Sa\Context\Core\Exceptions\InvalidContextException;

class ContextManager
{
    /**
     * @var array
     */
    protected $_contexts;

    /**
     * ContextManager constructor.
     * @param array $contexts
     */
    public function __construct(array $contexts)
    {
        $this->_contexts = $contexts;
    }

    /**
     * Return the Context
     *
     * @param $key
     * @return \Illuminate\Foundation\Application|mixed
     * @throws InvalidContextException
     */
    public function get($key)
    {
        $context = array_get($this->_contexts, $key);

        if ($context) {
            return app($context);
        }

        throw new InvalidContextException(sprintf('%s is not a valid Context', $key));
    }
}