Google analytics
================

Installation
------------
```sh
$ composer require geniv/nette-analytics
```
or
```json
"geniv/nette-analytics": ">=1.0.0"
```

require:
```json
"php": ">=5.6.0",
"nette/nette": ">=2.4.0"
```

Include in application
----------------------
neon configure:
```neon
# google analytics
analytics:
#   productionMode: true
#   async: true
    ga: 'UA-XXXXX-Y'
#   ga:
#       cs: 'UA-XXXXX-Y'
    gtm: 'GTM-XXXXXXX'
#   gtm:
#       cs: 'GTM-XXXXXXX'
```

neon configure extension:
```neon
extensions:
    analytics: Analytics\Bridges\Nette\Extension
```

base presenters:
```php
use Analytics\GoogleGa;

protected function createComponentGa(GoogleGa $googleGa)
{
    return $googleGa;
}

use Analytics\GoogleTagManager;

protected function createComponentGtm(GoogleTagManager $googleTagManager)
{
    return $googleTagManager;
}
```

usage:
```latte
{control ga}

{*high in the <head>*}
{control gtm}

{*after the opening <body> tag*}
{control gtm:body}
```
