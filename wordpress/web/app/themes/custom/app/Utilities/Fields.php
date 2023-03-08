<?php

namespace App\Utilities;

class Fields
{
    public static function getField($fieldName, $params = false, $format = true)
    {
        if (get_sub_field_object($fieldName)) {
            return get_sub_field($fieldName);
        }

        if (get_field_object($fieldName, 'options') != false) {
            return get_field($fieldName, 'options');
        }

        return get_field($fieldName, $params, $format);
    }
}
