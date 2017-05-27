<?php

namespace Analytics;

use Nette\Application\UI\Control;


/**
 * Class GoogleAnalytics
 *
 * @author  geniv
 * @package Analytics
 */
abstract class GoogleAnalytics extends Control
{
    protected $parameters;


    /**
     * GoogleAnalytics constructor.
     *
     * @param array $parameters
     */
    public function __construct(array $parameters)
    {
        $this->parameters = $parameters;
    }


    /**
     * Set locale code for switch ga/gtm code.
     *
     * @param $code
     */
    public function setLocaleCode($code)
    {
        if ($code) {
            // prepsani kodu ga podle lokalizace
            if (isset($this->parameters['ga']) && is_array($this->parameters['ga']) && isset($this->parameters['ga'][$code])) {
                $this->parameters['ga'] = $this->parameters['ga'][$code];
            }

            // prepsani kodu gtm podle lokalizace
            if (isset($this->parameters['gtm']) && is_array($this->parameters['gtm']) && isset($this->parameters['gtm'][$code])) {
                $this->parameters['gtm'] = $this->parameters['gtm'][$code];
            }
        }
    }


    /**
     * Main render.
     *
     * @return mixed
     */
    abstract public function render();
}
