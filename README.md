Analytics
=========

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

Analytics driver:
-----------------
- GA: https://developers.google.com/analytics/
    - https://analytics.google.com
- GTM: https://developers.google.com/tag-manager/ 
    - https://tagmanager.google.com
- Matomo: https://developer.matomo.org/guides/tracking-javascript-guide
    - https://matomo.org/

Include in application
----------------------
neon configure:
```neon
# google analytics
analytics:
#   productionMode: true
#   async: true     # olny for: GA
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
protected function createComponentGa(GoogleGa $googleGa)
{
    //return $googleGa->setLocaleCode($this->locale);
    return $googleGa;
}

protected function createComponentGtm(GoogleTagManager $googleTagManager)
{
    //return $googleTagManager->setLocaleCode($this->locale);
    return $googleTagManager;
}

protected function createComponentMatomo(Matomo $matomo)
{
    //return $matomo->setLocaleCode($this->locale);
    return $matomo;
}
```

usage:
```latte
{*high in the <head>*}
{control ga}

{*high in the <head>*}
{control gtm}

{*after the opening <body> tag*}
{control gtm:body}

{*high in the <head>*}
{control matomo}
```
