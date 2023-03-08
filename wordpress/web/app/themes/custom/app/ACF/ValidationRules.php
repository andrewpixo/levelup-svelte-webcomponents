<?php

namespace App\ACF;

class ValidationRules
{
    static function addAltTextRequiredForOptionalImage($imageFieldKey, $altTextFieldKey)
    {
        add_filter("acf/validate_value/key={$altTextFieldKey}",
            function($valid, $altText, $field, $input) use($imageFieldKey) {
                $imageId = $_POST['acf'][$imageFieldKey];
                $hasUploadedFeatureImage = $imageId != "";

                if($hasUploadedFeatureImage && $altText == "")
                {
                    $valid = "Alt text must be provided if an image is used.";
                }

                return $valid;
        }, 10, 4);
    }
}
