<?php declare(strict_types=1);

namespace Analytics;

/**
 * Class Matomo
 *
 * @author  geniv
 * @package Analytics
 */
class Matomo extends Analytics implements IMatomo
{
    const
        INDEX = 'matomo';

    /** @var array */
    private $templatePath;


    /**
     * Matomo constructor.
     *
     * @param array $parameters
     */
    public function __construct(array $parameters)
    {
        parent::__construct($parameters);

        // implicit path
        $this->templatePath = [
            'render' => __DIR__ . '/Matomo.latte',
            'body'   => __DIR__ . '/MatomoBody.latte',
        ];
    }


    /**
     * Set template path.
     *
     * @param string $path
     */
    public function setTemplatePath(string $path)
    {
        $this->templatePath['render'] = $path;
    }


    /**
     * Set template path.
     *
     * @param string $path
     */
    public function setTemplatePathBody(string $path)
    {
        $this->templatePath['body'] = $path;
    }


    /**
     * Render.
     */
    public function render()
    {
        $template = $this->getTemplate();

        $template->name = $name;
        $template->class = $class;

        $template->setTranslator($this->translator);
        $template->setFile($this->templatePath['begin']);
        $template->render();


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
