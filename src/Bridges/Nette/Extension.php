<?php

namespace Analytics\Bridges\Nette;

use Analytics\GoogleGa;
use Analytics\GoogleTagManager;
use Exception;
use Nette\DI\CompilerExtension;


/**
 * Class Extension
 *
 * nette extension pro GA a GTM jako rozsireni
 *
 * @author  geniv
 * @package Analytics\Bridges\Nette
 */
class Extension extends CompilerExtension
{

    /**
     * Load configuration.
     */
    public function loadConfiguration()
    {
        $builder = $this->getContainerBuilder();
        $config = $this->getConfig();

        if (!isset($config['parameters'])) {
            throw new Exception('Parameters is not defined! (' . $this->name . ':{parameters: {...}})');
        }

        // vlozeni detekce produkcniho modu, pokud neni definovano
        if (!isset($config['parameters']['productionMode'])) {
            $config['parameters']['productionMode'] = $builder->parameters['productionMode'];
        }

        $builder->addDefinition($this->prefix('default'))
            ->setClass(GoogleGa::class, [$config['parameters']])
            ->setInject(false);

        $builder->addDefinition($this->prefix('default'))
            ->setClass(GoogleTagManager::class, [$config['parameters']])
            ->setInject(false);
    }
}
