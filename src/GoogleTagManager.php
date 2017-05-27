<?php

namespace Analytics;


/**
 * Class GoogleTagManager
 *
 * @author  geniv
 * @package Analytics
 */
class GoogleTagManager extends GoogleAnalytics
{

    /**
     * GoogleTagManager constructor.
     *
     * @param array $parameters
     */
    public function __construct(array $parameters)
    {
        parent::__construct($parameters);
    }


    /**
     * Main render.
     */
    public function render()
    {
        if (isset($this->parameters['gtm']) && $this->parameters['productionMode']) {
            echo <<<GTM
<!-- Google Tag Manager -->
<script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
})(window,document,'script','dataLayer','{$this->parameters['gtm']}');</script>
<!-- End Google Tag Manager -->
GTM;

        } else {
            echo '<!-- Google Tag Manager head -->';
        }
    }


    /**
     * Body render.
     */
    public function renderBody()
    {
        if (isset($this->parameters['gtm']) && $this->parameters['productionMode']) {
            echo <<<GTM
<!-- Google Tag Manager (noscript) -->
<noscript><iframe src="https://www.googletagmanager.com/ns.html?id={$this->parameters['gtm']}"
height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
<!-- End Google Tag Manager (noscript) -->
GTM;

        } else {
            echo '<!-- Google Tag Manager head -->';
        }
    }
}
