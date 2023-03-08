<?php

namespace App\ViewModels;

class RepeaterViewModelFactory
{
    public static function createViewModels($fieldName, $repeaterCallback, $params = false): ?array
    {
        if (have_rows($fieldName, $params)) {
            $fields = [];
            while(have_rows($fieldName, $params)) {
                the_row();
                array_push($fields, $repeaterCallback());
            }
            return $fields;
        }
        return null;
    }
}
