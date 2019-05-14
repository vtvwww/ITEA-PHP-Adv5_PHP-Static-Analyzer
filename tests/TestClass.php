<?php

/*
 * This file is part of the "PHP Static Analyzer" project.
 *
 * (c) Vladimir Kuprienko <vldmr.kuprienko@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Vtvwww\Tests\Fixtures;

abstract class TestClass implements \Iterator
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

    public function current()
    {
        // TODO: Implement current() method.
    }

    public function next()
    {
        // TODO: Implement next() method.
    }

    public function key()
    {
        // TODO: Implement key() method.
    }

    public function valid()
    {
        // TODO: Implement valid() method.
    }

    public function rewind()
    {
        // TODO: Implement rewind() method.
    }

    abstract public function getName();
}
