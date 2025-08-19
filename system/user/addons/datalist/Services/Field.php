<?php

namespace Mithra62\DataList\Services;

use Mithra62\DataList\Fields\DataList\Field as DataListField;

class Field
{
    /**
     * Returns the HTML Input field for the datalist
     * @param $name
     * @param $value
     * @param array $options
     * @return string
     */
    public function generate($name, $value, array $options = [])
    {
        $field = new DataListField();
        return $field->setOptions($options)
            ->setValue($value)
            ->setName($name)
            ->generate();
    }
}