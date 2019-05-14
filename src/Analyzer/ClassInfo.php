<?php

/*
 * This file is part of the "PHP Static Analyzer" project.
 *
 * (c) Vladimir Tverdohleb <vtv.www@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Greeflas\StaticAnalyzer\Analyzer;

use \Greeflas\StaticAnalyzer\Model\ClassInfoModel;
use Greeflas\StaticAnalyzer\Exception\ClassInfoReflactionException;

/**
 * Analyzer that provides number of properties and methods.
 *
 * @author Vladimir Tverdohleb <vtv.www@gmail.com>
 */
final class ClassInfo
{
    /**
     * @var string The class that is being analyzed
     */
    private $class_name;

    public function __construct(string $class_name)
    {
        $this->class_name = $class_name;

    }

    /**
     * Method analyzing the received class
     * @return null|array
     *
     * @throws ClassInfoReflactionException
     */
    public function analyze(): ?array
    {
        $result = null;

        try {
            $reflector = new \ReflectionClass($this->class_name);

            $class_data = new ClassInfoModel();

            $class_data
                ->addName($reflector->getName())
                ->addType($reflector->isFinal() ? 'final' : null)
                ->addType($reflector->isAbstract() ? 'abstract' : null)
            ;

            // Get Properties
            if ($reflector->getProperties()) {
                foreach ($reflector->getProperties() as $property) {
                    foreach (['public', 'protected', 'private'] as $t) {
                        $func = 'is' . $t;
                        if ($property->$func()) {
                            $class_data->addProperty($t);
                        }
                    }
                }
            }

            // Get Methods
            if ($reflector->getMethods()) {
                foreach ($reflector->getMethods() as $method) {
                    foreach (['public', 'protected', 'private'] as $t) {
                        $func = 'is' . $t;

                        if ($method->$func()) {
                            $class_data->addMethod($t);
                        }
                    }
                }
            }

            $result = $class_data->getInfo();

        } catch (ClassInfoReflactionException $e) {
            echo $e->getMessage() . PHP_EOL;
        }

        return $result;
    }
}
