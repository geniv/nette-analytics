<?php declare(strict_types=1);

namespace Analytics;


/**
 * Class Matomo
 *
 * @author  geniv
 * @package Analytics
 */
class Matomo extends Analytics
{
    const
        INDEX = 'matomo';


    /**
     * Render.
     */
    public function render()
    {
        if (isset($this->parameters[self::INDEX]) && $this->parameters['productionMode']) {
            echo <<<MATOMO
        <!-- Matomo -->
        <script type="text/javascript">
          var _paq = _paq || [];
          _paq.push(['trackPageView']);
          _paq.push(['enableLinkTracking']);
          (function() {
            var u="//{$this->parameters[self::INDEX]['url']}/";
            _paq.push(['setTrackerUrl', u+'piwik.php']);
            _paq.push(['setSiteId', '{$this->parameters[self::INDEX]['siteId']}']);
            var d=document, g=d.createElement('script'), s=d.getElementsByTagName('script')[0];
            g.type='text/javascript'; g.async=true; g.defer=true; g.src=u+'piwik.js'; s.parentNode.insertBefore(g,s);
          })();
        </script>
        <!-- End Matomo -->
MATOMO;
        } else {
            echo '<!-- Matomo head -->' . PHP_EOL;
        }
    }


    /**
     * Render body.
     */
    public function renderBody()
    {
        if (isset($this->parameters[self::INDEX]) && $this->parameters['productionMode']) {
            echo <<<MATOMO
        <!-- Matomo (noscript) -->
        <noscript><p><img src="//{$this->parameters[self::INDEX]['url']}/piwik.php?idsite={$this->parameters[self::INDEX]['siteId']}&rec=1" style="border:0;" alt="" /></p></noscript>
        <!-- End Matomo (noscript) -->
MATOMO;
        } else {
            echo '<!-- Matomo body -->' . PHP_EOL;
        }
    }
}
