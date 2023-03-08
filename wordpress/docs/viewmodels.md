# Viewmodel

All viewmodels are stored and organized in the `app/ViewModels/` directory.

```
[theme]/app/ViewModels/
[theme]/app/ViewModels/Components
[theme]/app/ViewModels/Helpers
```

## Component viewmodels

Component viewmodels are loaded automatically from the [ComponentViewModelFactory.php](web/app/themes/custom/app/ViewModels/ComponentViewModelFactory.php).

## Viewmodel Helpers

Some viewmodels have some patterns that regularly get used. For this there are some viewmodel helps created to help standardize and simply viewmodle creation.

### Image

Responsive images viewmodels are complex but are very similar. The [image helper viewmodel](web/app/themes/custom/app/ViewModels/Helpers/Image.php) should be used for the vast majority of image fields.

### Call-to-action button

The call to action button is a frequent pattern. A [call-to-action utility](web/app/themes/custom/app/ViewModels/Helpers/CallToActionButton.php) exists when you need such a button as a part of your viewmodel.

### Repeater

Repeaters in ACF can be tricky and complex. The [repeator factory](web/app/themes/custom/app/ViewModels/RepeaterViewModelFactory.php) can be called to easily handle any repeator field.
