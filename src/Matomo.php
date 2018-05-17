<?php

namespace Analytics;


/**
 * Class Matomo
 *
 * @author  geniv
 * @package Analytics
 */
class Matomo extends Analytics
{

    /**
     * GoogleGa constructor.
     *
     * @param array $parameters
     */
    public function __construct(array $parameters)
    {
        parent::__construct($parameters);
    }


    /**
     * Render.
     */
    public function render()
    {
        if (isset($this->parameters['gtm']) && $this->parameters['productionMode']) {
            echo <<<MATOMO
        <!-- Matomo -->
        <script type="text/javascript">
          var _paq = _paq || [];
          _paq.push(['trackPageView']);
          _paq.push(['enableLinkTracking']);
          (function() {
            var u="//web-analytics.iprpraha.cz/";
            _paq.push(['setTrackerUrl', u+'piwik.php']);
            _paq.push(['setSiteId', '46']);
            var d=document, g=d.createElement('script'), s=d.getElementsByTagName('script')[0];
            g.type='text/javascript'; g.async=true; g.defer=true; g.src=u+'piwik.js'; s.parentNode.insertBefore(g,s);
          })();
        </script>
        <!-- End Matomo -->
MATOMO;
        } else {
            echo '<!-- Matomo head -->';
        }
    }


    /**
     * Render body.
     */
    public function renderBody()
    {
        if (isset($this->parameters['gtm']) && $this->parameters['productionMode']) {
            echo <<<MATOMO
        <!-- Matomo (noscript) -->
        <noscript><p><img src="//web-analytics.iprpraha.cz/piwik.php?idsite=46&rec=1" style="border:0;" alt="" /></p></noscript>
        <!-- End Matomo (noscript) -->
MATOMO;
        } else {
            echo '<!-- Matomo body -->';
        }
    }
}
