<?php

/*
 * This file is part of the "PHP Static Analyzer" project.
 *
 * (c) Vladimir Kuprienko <vldmr.kuprienko@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Greeflas\StaticAnalyzer\Model;

/**
 * Class ClassInfoModel
 *
 * Container class - used to store information about Class
 */
class ClassInfoModel
{
    /**
     * Short list about Class
     *
     * @var array
     */
    private $class_data = [];

    public function __construct()
    {
        $this->class_data = [
            'class_name' => '',
            'class_type' => [],
            'properties_public' => 0,
            'properties_protected' => 0,
            'properties_private' => 0,
            'methods_public' => 0,
            'methods_protected' => 0,
            'methods_private' => 0,
        ];
    }

    /**
     * Add Class name
     *
     * @param string $name
     *
     * @return ClassInfoModel
     */
    public function addName(string $name): self
    {
        $this->class_data['class_name'] = $name;

        return $this;
    }

    /**
     * Add Class type (abstract|final)
     *
     * @param null|string $type
     *
     * @return ClassInfoModel
     */
    public function addType(?string $type): self
    {
        if (null !== $type) {
            $this->class_data['class_type'][] = $type;
        }

        return $this;
    }

    /**
     * Add a new property
     *
     * @param string $type
     *
     * @return $this
     */
    public function addProperty(string $type): self
    {
        $this->class_data['properties_' . $type]++;

        return $this;
    }

    /**
     * Add a new method
     *
     * @param string $type
     *
     * @return $this
     */
    public function addMethod(string $type): self
    {
        $this->class_data['methods_' . $type]++;

        return $this;
    }

    /**
     * Get short info about Class
     *
     * @return array
     */
    public function getInfo()
    {
        $result = $this->class_data;
        $result['class_type'] = (empty($result['class_type'])) ? 'normal' : \implode(', ', $result['class_type']);

        return $result;
    }
}
