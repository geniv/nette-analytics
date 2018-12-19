<?php declare(strict_types=1);

namespace Analytics;

/**
 * Class GoogleTagManager
 *
 * @author  geniv
 * @package Analytics
 */
class GoogleTagManager extends Analytics implements IGoogleTagManager
{
    const
        INDEX = 'gtm';

    /** @var array */
    private $templatePath;


    /**
     * GoogleTagManager constructor.
     *
     * @param array $parameters
     */
    public function __construct(array $parameters)
    {
        parent::__construct($parameters);

        $this->templatePath = __DIR__ . '/BrowserSync.latte'; // set path

        // implicit path
        $this->templatePath = [
            'render' => __DIR__ . '/GoogleTagManager.latte',
            'body'   => __DIR__ . 'GoogleTagManagerBody.latte',
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
        if (isset($this->parameters[self::INDEX]) && $this->parameters['productionMode']) {
            echo <<<GTM
        <!-- Google Tag Manager -->
        <script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
        new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
        j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
        'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
        })(window,document,'script','dataLayer','{$this->parameters[self::INDEX]}');</script>
        <!-- End Google Tag Manager -->
GTM;
        } else {
            echo '<!-- Google Tag Manager head -->' . PHP_EOL;
        }
    }


    /**
     * Render body.
     */
    public function renderBody()
    {
        if (isset($this->parameters[self::INDEX]) && $this->parameters['productionMode']) {
            echo <<<GTM
        <!-- Google Tag Manager (noscript) -->
        <noscript><iframe src="https://www.googletagmanager.com/ns.html?id={$this->parameters[self::INDEX]}" height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
        <!-- End Google Tag Manager (noscript) -->
GTM;
        } else {
            echo '<!-- Google Tag Manager body -->' . PHP_EOL;
        }
    }
}
