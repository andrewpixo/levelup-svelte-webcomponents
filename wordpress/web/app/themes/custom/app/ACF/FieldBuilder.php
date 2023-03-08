<?php

namespace App\ACF;

class FieldBuilder extends \StoutLogic\AcfBuilder\FieldBuilder
{
    /**
     * Will set field's label.
     * @param string $label
     * @return $this
     */
    public function setLabel($label)
    {
        return $this->setConfig('label', $label);
    }

    /**
     * Will set field's width.
     * @param string $value
     * @return $this
     */
    public function setWidth($value)
    {
        return $this->setConfig('wrapper', ['width' => $value]);
    }

    function setRequiredIfAssociatedImageExists($thisKey, $associatedImageKey)
    {
        add_filter("acf/validate_value/key={$thisKey}",
            function($valid, $altText, $field, $input) use($associatedImageKey) {
                $imageId = $this->getFieldValueForKeyFromAcfInput($associatedImageKey, $input);
                $hasUploadedFeatureImage = $imageId != "";

                if($hasUploadedFeatureImage && $altText == "")
                {
                    $valid = "Alt text must be provided if an image is used.";
                }

                return $valid;
        }, 10, 4);
    }

    // $input will look something like acf[field_page_components][row-1][field_page_components_image_image_alt_text]
    // for content in a flexible content block. this code will pull out the correct value from the $_POST array
    // adapted from https://support.advancedcustomfields.com/forums/topic/validation-of-a-field-based-on-the-value-of-another-field/
    private function getFieldValueForKeyFromAcfInput($key, $input)
    {
        preg_match_all('/\[([^\]]+)\]/', $input, $postArrayIndexes);
        $postArrayIndexes = $postArrayIndexes[1];

        $row = $_POST['acf'];
        $count = count($postArrayIndexes)-1;

        foreach(range(0,$count) as $i)
        {
            $row = $row[$postArrayIndexes[$i]];
            if (isset($row[$key])) {
                return $row[$key];
            }
        }

        return null;
    }
}
