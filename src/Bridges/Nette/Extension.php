<?php

namespace Analytics\Bridges\Nette;

use Analytics\GoogleGa;
use Analytics\GoogleTagManager;
use Nette\DI\CompilerExtension;


/**
 * Class Extension
 *
 * @author  geniv
 * @package Analytics\Bridges\Nette
 */
class Extension extends CompilerExtension
{
    /** @var array default values */
    private $defaults = [
        'productionMode' => null,   // default null => automatic mode
        'async'          => false,
        'ga'             => 'UA-XXXXX-Y',
        'gtm'            => 'GTM-XXXXXXX',
    ];


    /**
     * Load configuration.
     */
    public function loadConfiguration()
    {
        $builder = $this->getContainerBuilder();
        $config = $this->validateConfig($this->defaults);

        // if is set then manual set value
        if (!isset($config['productionMode'])) {
            $config['productionMode'] = $builder->parameters['productionMode'];
        }

        // define ga
        $builder->addDefinition($this->prefix('ga'))
            ->setClass(GoogleGa::class, [$config]);

        // define gtm
        $builder->addDefinition($this->prefix('gtm'))
            ->setClass(GoogleTagManager::class, [$config]);
    }
}
