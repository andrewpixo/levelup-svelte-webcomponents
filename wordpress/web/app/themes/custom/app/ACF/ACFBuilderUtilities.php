<?php

namespace App\ACF;

use StoutLogic\AcfBuilder\FieldsBuilder;

class ACFBuilderUtilities
{
    public static function initialize()
    {
        add_action('init', function () {
            collect(glob(get_template_directory() . '/app/Fields/*.php'))
                ->map(function ($field) {
                    return require_once($field);
                })
                ->map(function ($field) {
                    if ($field instanceof FieldsBuilder) {
                        acf_add_local_field_group($field->build());
                    }
                });

            collect(glob(get_template_directory() . '/app/Extensions/*.php'))
                ->map(function ($field) {
                    return require_once($field);
                });

            collect(glob(get_template_directory() . '/app/ViewModels/**/*.php'))
                ->map(function ($field) {
                    return require_once($field);
                });
        });

    }
}
