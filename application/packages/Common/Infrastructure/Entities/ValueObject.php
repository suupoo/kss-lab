<?php
/**
 * Created by PhpStorm.
 * User: shoil
 * Date: 2019/06/02
 * Time: 23:09
 */

namespace Packages\Common\Infrastructure\Entities;

class ValueObject
{
    private $isChained = false;
    private $id = 0;

    /**
     * ValueObject constructor.
     * @param bool $isChained メソッドチェーンを可能とするか
     */
    public function __construct(bool $isChained= false)
    {
        $this->isChained = $isChained;
    }

    /**
     * @param $name
     * @return mixed
     * @throws \ErrorException
     */
    public function __get($name)
    {
        if( !property_exists($this,$name) ||
            !get_class($this) === $name)throw new \ErrorException('Value Objectが存在しません。');
        return $this->{$name};
    }

    /**
     * @param $name
     * @param $value
     */
    public function __set($name, $value)
    {
        $this->${$name} = $value;
    }
}