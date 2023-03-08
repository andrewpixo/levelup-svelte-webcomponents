<?php

namespace App\ViewModels;

use Timber\Post;
use Exception;

class FlexibleContentViewModelFactory
{
    public static function createViewModels(Post $post, $params = false, $fieldName = 'components', $classNameSpace = 'App\\ViewModels\\Components'): ?array
    {
        $layouts = [];
        if (have_rows($fieldName, $params)) {
            while(have_rows($fieldName, $params)) {
                the_row();
                $type = get_row_layout();
                array_push($layouts, call_user_func(
                    self::getBuilderFunction($type, $classNameSpace),
                    $post
                ));
            }
            return $layouts;
        }
        return null;
    }

    public static function getBuilderFunction($type, $classNameSpace): array
    {
        $declaredClasses = collect(get_declared_classes());
        $classesInNamespace = $declaredClasses->filter(function($className) use ($classNameSpace) {

            return strpos($className, $classNameSpace) !== false;
        });

        $classesThatSupportType = $classesInNamespace->filter(function($className) use($type) {
            $typeSupported = call_user_func(array($className, 'getSupportedComponentType'));
            return $typeSupported == $type;
        });

        if(count($classesThatSupportType) == 0)
            throw new Exception("No layout viewmodel builder found for type {$type}");

        return [$classesThatSupportType->first(), 'createFromPost'];
    }
}
