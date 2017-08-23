<?php
/**
 * Created by PhpStorm.
 * User: sergii
 * Date: 20.04.17
 * Time: 09:00
 */

namespace Sa\Context\Core;

use Sa\Context\Core\Exceptions\ContextNotSetException;

class UnknownContext
{
    /**
     * @var string
     */
    private $type;

    /**
     * UnknownContext constructor.
     * @param $type
     */
    public function __construct($type)
    {
        $this->type = $type;
    }

    /**
     * Catch all method calls
     *
     * @param string $name
     * @param mixed $arguments
     * @return void
     */
    public function __call($name, $arguments)
    {
        $this->handle();
    }

    /**
     * Catch all get calls
     *
     * @param string $name
     * @return void
     */
    public function __get($name)
    {
        $this->handle();
    }

    /**
     * Catch all set calls
     *
     * @param string $name
     * @param string $value
     * @return void
     */
    public function __set($name, $value)
    {
        $this->handle();
    }

    /**
     * Handle all calls to the class
     *
     * @throws ContextNotSetException
     */
    private function handle()
    {
        throw new ContextNotSetException(sprintf('The Context type %s has not been set', $this->type));
    }
}