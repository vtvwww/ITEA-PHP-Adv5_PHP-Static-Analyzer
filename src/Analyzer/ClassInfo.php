<?php

namespace Vtvwww\StaticAnalyzer\Analyzer;

use Vtvwww\Tests\SomeClasses\TestClass;

include __DIR__ . '/../../tests/TestClass.php';
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
    private $class;

    public function __construct(string $class)
    {
        $this->class = $class;
    }

    /**
     * Method analyzing the received class
     *
     * @return array|null
     */
    public function analyze(): ?array
    {
        $class = new $this->class();

        $result = [
            'class_name' => '',
            'class_type' => '',
            'properties_public' => 0,
            'properties_protected' => 0,
            'properties_private' => 0,
            'methods_public' => 0,
            'methods_protected' => 0,
            'methods_private' => 0,
        ];

        if (!is_object($class)) return null;
            try {
                $reflector = new \ReflectionClass($class);

                // Get Name
                $result['class_name'] = $reflector->getName();

                // Get Class type
                foreach (['isFinal', 'isIterable', ] as $item) {
                    if ($reflector->$item()){
                        $result['class_type'] .= '"' . str_replace(['is'], '', $item) . '"' . ', ';
                    }
                }

                if (empty($result['class_type'])){
                    $result['class_type'] = '"Normal"';
                }else $result['class_type'] = \trim($result['class_type'], ' ,');


                // Get Properties
                if ($reflector->getProperties()){
                    foreach ($reflector->getProperties() as $property){
                        foreach (['public', 'protected', 'private'] as $t){
                            $func = 'is' . $t;
                            if ($property->$func()) {
                                $result['properties_' . $t]++;
                            }
                        }
                    }
                }

                // Get Methods
                if ($reflector->getMethods()){
                    foreach ($reflector->getMethods() as $method){
                        foreach (['public', 'protected', 'private'] as $t){
                            $func = 'is' . $t;
                            if ($method->$func()) {
                                $result['methods_' . $t]++;
                            }
                        }
                    }
                }

            } catch (\ReflectionException $e) {
                die('Class ' . $this->class . 'not found!');
            }

        return $result;
    }
}
