<?php

namespace Analytics;

use Nette\Application\UI\Control;


/**
 * Class Analytics
 *
 * @author  geniv
 * @package Analytics
 */
abstract class Analytics extends Control
{
    protected $parameters;


    /**
     * Analytics constructor.
     *
     * @param array $parameters
     */
    public function __construct(array $parameters)
    {
        parent::__construct();

        $this->parameters = $parameters;
    }


    /**
     * Set locale code for switch ga/gtm code.
     *
     * @param $code
     * @return $this
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
        return $this;
    }


    /**
     * Main render.
     *
     * @return mixed
     */
    abstract public function render();
}
