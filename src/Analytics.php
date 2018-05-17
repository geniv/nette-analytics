<?php declare(strict_types=1);

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
    /** @var array */
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
     * Set locale code.
     *
     * @param string $code
     */
    public function setLocaleCode(string $code)
    {
        if ($code) {
            // rewrite code by locale code
            if (isset($this->parameters[static::INDEX]) && is_array($this->parameters[static::INDEX]) && isset($this->parameters[static::INDEX][$code])) {
                $this->parameters[static::INDEX] = $this->parameters[static::INDEX][$code];
            }
        }
    }


    /**
     * Render.
     */
    abstract public function render();
}
