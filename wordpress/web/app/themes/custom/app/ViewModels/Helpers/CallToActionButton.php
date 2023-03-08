<?php

namespace App\ViewModels\Helpers;

use App\Utilities\Fields;

class CallToActionButton
{
    public $text;
    public $url;
    public $external;

    public static function createModel($fieldPrefix = 'cta'): ?CallToActionButton
    {
        $cta = self::getFieldData($fieldPrefix);
        $ctaUrlType = $cta->type.'_url';
        $cta->enabled = !is_null($cta->text) && !is_null($cta->$ctaUrlType);
        return self::build($cta);
    }

    public static function createConditionalModel($fieldPrefix = 'cta'): ?CallToActionButton
    {
        $cta = self::getFieldData($fieldPrefix);
        return self::build($cta);
    }

    public static function getFieldData($fieldPrefix): \stdClass
    {
        $cta = new \stdClass();
        $cta->enabled = Fields::getField('add_cta');
        $cta->text = Fields::getField("{$fieldPrefix}_text");
        $cta->internal_url = Fields::getField("{$fieldPrefix}_internal_url");
        $cta->external_url = Fields::getField("{$fieldPrefix}_external_url");
        $cta->type = Fields::getField("{$fieldPrefix}_type");

        return $cta;
    }

    public function __construct($cta)
    {
        $this->text = $cta->text;
        $this->external = self::isExternalLink($cta);
        $this->url = self::getUrl($cta);
    }

    private static function getUrl($cta): string
    {
        return $cta->{$cta->type . '_url'};
    }

    public static function isExternalLink($cta): bool
    {
        return $cta->type == 'external';
    }

    public static function build($cta): ?CallToActionButton
    {
        return $cta->enabled ? new CallToActionButton($cta) : null;
    }
}
