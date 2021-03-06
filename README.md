Analytics
=========

Installation
------------
```sh
$ composer require geniv/nette-analytics
```
or
```json
"geniv/nette-analytics": "^1.0"
```

require:
```json
"php": ">=7.0",
"nette/nette": ">=2.4",
"geniv/nette-general-form": ">=1.0"
```

Analytics driver:
-----------------
- GA: https://analytics.google.com
    - https://developers.google.com/analytics/
- GTM: https://tagmanager.google.com
    - https://developers.google.com/tag-manager/
- Matomo: https://matomo.org/
    - https://developer.matomo.org/guides/tracking-javascript-guide

Include in application
----------------------
neon configure:
```neon
# analytics
analytics:
#   productionMode: true
    ga: 'UA-XXXXX-Y'
#   ga:
#       cs: 'UA-XXXXX-Y'
    gtm: 'GTM-XXXXXXX'
#   gtm:
#       cs: 'GTM-XXXXXXX'
    matomo:
        url: 'url.piwik.url'
        siteId: '123'
#    matomo:
#        cs:
#            url: 'url.piwik.url'
#            siteId: '123'
```

neon configure extension:
```neon
extensions:
    analytics: Analytics\Bridges\Nette\Extension
```

base presenters:
```php
protected function createComponentGa(IGoogleGa $googleGa): IGoogleGa
{
    //$googleGa->setLocaleCode($this->locale);
    //$googleGa->setTemplatePath(__DIR__ . '/templates/googleGa.latte');
    return $googleGa;
}

protected function createComponentGtm(IGoogleTagManager $googleTagManager): IGoogleTagManager
{
    //$googleTagManager->setLocaleCode($this->locale);
    //$googleTagManager->setTemplatePath(__DIR__ . '/templates/googleTagManager.latte');
    return $googleTagManager;
}

protected function createComponentMatomo(IMatomo $matomo): IMatomo
{
    //$matomo->setLocaleCode($this->locale);
    //$matomo->setTemplatePath(__DIR__ . '/templates/matomo.latte');
    return $matomo;
}
```

usage GA:
```latte
{*high in the <head>*}
{control ga}
```

usage GTM:
```latte
{*high in the <head>*}
{control gtm}

{*after the opening <body> tag*}
{control gtm:body}
```

usage Matomo:
```latte
{*high in the <head>*}
{control matomo}

{*after the opening <body> tag*}
{control matomo:body}
```
