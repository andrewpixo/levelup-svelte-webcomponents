<?php

namespace App\ViewModels\Components;

use App\Utilities\Fields;
use Timber\Post;
use App\ViewModels\Helpers\Image as ImageHelper;

class TextComponentViewModel implements ComponentViewModel
{
    public $type;
    public $header;
    public $richText;
    public $image;
    public $imageToggle;
    public $placement;
    public $width;

    public static function getSupportedComponentType()
    {
        return "text";
    }

    public static function createFromPost($post)
    {
        $viewModel = new TextComponentViewModel();
        $viewModel->type = self::getSupportedComponentType();
        $viewModel->header = Fields::getField("header");
        $viewModel->hideHeader = Fields::getField("hide_header");
        $viewModel->richText = wpautop(Fields::getField("rich_text"));

        $viewModel->imageToggle = Fields::getField("add_image");
        if ($viewModel->imageToggle && Fields::getField('image')) {
            $viewModel->image = ImageHelper::createConditionalModel();
            $viewModel->placement = Fields::getField("placement");
            $viewModel->width = Fields::getField("size");
        }

        return $viewModel;
    }
}
