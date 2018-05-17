<?php

namespace Analytics;


/**
 * Class GoogleGa
 *
 * @author  geniv
 * @package Analytics
 */
class GoogleGa extends Analytics
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
        if (isset($this->parameters['ga']) && $this->parameters['productionMode']) {
            if (isset($this->parameters['async']) && $this->parameters['async']) {
                echo <<<GA
        <!-- Google Analytics -->
        <script>
        window.ga=window.ga||function(){(ga.q=ga.q||[]).push(arguments)};ga.l=+new Date;
        ga('create', '{$this->parameters['ga']}', 'auto');
        ga('send', 'pageview');
        </script>
        <script async src='https://www.google-analytics.com/analytics.js'></script>
        <!-- End Google Analytics -->
GA;
            } else {
                echo <<<GA
        <!-- Google Analytics -->
        <script>
        (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
        (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
        m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
        })(window,document,'script','https://www.google-analytics.com/analytics.js','ga');
        
        ga('create', '{$this->parameters['ga']}', 'auto');
        ga('send', 'pageview');
        </script>
        <!-- End Google Analytics -->
GA;
            }
        } else {
            echo '<!-- Google Analytics -->';
        }
    }
}
