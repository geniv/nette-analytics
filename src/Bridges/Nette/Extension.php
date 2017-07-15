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
    /** @var array vychozi hodnoty */
    private $defaults = [
        'ga'             => 'UA-XXXXX-Y',
        'gtm'            => 'GTM-XXXXXXX',
        'productionMode' => false,
        'async'          => false,
    ];


    /**
     * Load configuration.
     */
    public function loadConfiguration()
    {
        $builder = $this->getContainerBuilder();
        $config = $this->validateConfig($this->defaults);

        // vlozeni detekce produkcniho modu, pokud neni definovano
        if (!isset($config['productionMode'])) {
            $config['productionMode'] = $builder->parameters['productionMode'];
        }

        // definice komponent
        $builder->addDefinition($this->prefix('ga'))
            ->setClass(GoogleGa::class, [$config]);

        $builder->addDefinition($this->prefix('gtm'))
            ->setClass(GoogleTagManager::class, [$config]);
    }
}
