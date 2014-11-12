<?php

namespace Stef\SlugManipulation\Manipulators;

use Stef\Manipulation\Manipulators\AbstractStringManipulator;

class FullPathSlugManipulator extends AbstractStringManipulator{

    /**
     * @var AbstractStringManipulator
     */
    protected $slugManipulator;

    function __construct(AbstractStringManipulator $manipulator)
    {
        $this->slugManipulator = $manipulator;
    }

    protected function run($string)
    {
        $string = trim($string);
        $string = trim($string, '/');
        $parts = explode('/', $string);

        foreach ($parts as $key => $value) {
            $parts[$key] = $this->slugManipulator->manipulate($value);
        }

        return implode('/', $parts);
    }
} 