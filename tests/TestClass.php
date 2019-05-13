<?php

/*
 * This file is part of the "PHP Static Analyzer" project.
 *
 * (c) Vladimir Tverdohleb <vtv.www@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Vtvwww\Tests\SomeClasses;

final class TestClass implements \Iterator
{
    private static $param11 = '';
    private static $param12 = '';
    private static $param13 = '';
    protected $param21 = '';
    protected $param22 = '';
    public static $param3 = '';

    public function __construct()
    {
    }

    public function __call($name, $arguments)
    {
        // TODO: Implement __call() method.
    }

    private function __wakeup()
    {
        // TODO: Implement __wakeup() method.
    }

    protected function __clone()
    {
        // TODO: Implement __clone() method.
    }

    public function __destruct()
    {
        // TODO: Implement __destruct() method.
    }

    /**
     * Return the current element
     *
     * @link https://php.net/manual/en/iterator.current.php
     *
     * @return mixed Can return any type.
     *
     * @since 5.0.0
     */
    public function current()
    {
        // TODO: Implement current() method.
    }

    /**
     * Move forward to next element
     *
     * @link https://php.net/manual/en/iterator.next.php
     * @since 5.0.0
     */
    public function next()
    {
        // TODO: Implement next() method.
    }

    /**
     * Return the key of the current element
     *
     * @link https://php.net/manual/en/iterator.key.php
     *
     * @return mixed scalar on success, or null on failure.
     *
     * @since 5.0.0
     */
    public function key()
    {
        // TODO: Implement key() method.
    }

    /**
     * Checks if current position is valid
     *
     * @link https://php.net/manual/en/iterator.valid.php
     *
     * @return bool The return value will be casted to boolean and then evaluated.
     * Returns true on success or false on failure.
     *
     * @since 5.0.0
     */
    public function valid()
    {
        // TODO: Implement valid() method.
    }

    /**
     * Rewind the Iterator to the first element
     *
     * @link https://php.net/manual/en/iterator.rewind.php
     * @since 5.0.0
     */
    public function rewind()
    {
        // TODO: Implement rewind() method.
    }
}
