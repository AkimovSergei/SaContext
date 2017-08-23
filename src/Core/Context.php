<?php

namespace Sa\Context\Core;

use Illuminate\Database\Eloquent\Model;

/**
 * Created by PhpStorm.
 * User: sergii
 * Date: 20.04.17
 * Time: 08:54
 */
abstract class Context
{
    /**
     * @var Model
     */
    protected $_model;

    /**
     * @var string
     */
    protected static $_type;
    
    /**
     * Get context type
     *
     * @return string
     */
    public static function getType()
    {
        return static::$_type;
    }

    /**
     * Check is context has been set
     *
     * @return bool
     */
    public function check()
    {
        return !is_null($this->_model);
    }

    /**
     * @return mixed|null
     */
    public function id()
    {

        if ($this->check()) {
            return $this->_model->getKey();
        }
        return null;
    }

    /**
     * Set the context
     *
     * @param Model $model
     * @return Context
     */
    public function set(Model $model)
    {
        $this->_model = $model;

        return $this;
    }

    /**
     * Get the underlying Model
     *
     * @return UnknownContext|Model
     */
    public function model()
    {
        if ($this->check()) {
            return $this->_model;
        }

        return new UnknownContext(static::$_type);
    }

}