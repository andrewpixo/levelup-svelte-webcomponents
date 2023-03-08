# Images

This project has an extensive level of image handling support.

## Responsive

Images are made responsive automatically but can be toggled off.

The responsive breakpoints and sizes are configured [here](web/app/themes/custom/app/Utilities/InitializeImageDimensions.php).

## WebP optimization

All images are converted to WebP with JPG fallbacks on browsers that don't support WebP.

## Lazy loading

All images use the lazy loading attribute by default. Lazy loading can and should be disabled on images the will likely be in view on page load.

## Usage

```twig
{% include 'partials/image/image.twig' with {
    image: component.image,
    isResponsive: true
    cropWidth: 880,
    lazyLoading: false
} %}

```

In this example

1. the image object data is passed in
2. the image will set an array of breakpoints and related image sizes to pass to the srcset elements
3. The image is cropped to a max width of 880px and the respsponsive breakpoints are capped to 880px as well
4. The image will not have the lazing loading attribute added.



| Variable      | Default | Description |
| --------------|---------|-------------|
| `image`       |         | The image object that contains `altText`, `src`, `mimeType`, `naturalWidth`, `naturalHeight`, `caption`.|
| `isResponsive`| TRUE    | If set to true adds and array of responsive sizes to the image up the `cropWidth`. OPTIONAL|
| `lazyLoading` | TRUE    | Will enable or disable the lazy loading image attribute. OPTIONAL|
| `cropWidth`   |         | Will crop the image width or set the maximum responsive size. If used without `cropHeight`. OPTIONAL.|
| `cropHeight`  |         | Will crop the inage height. OPTIONAL.|

