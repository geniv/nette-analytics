<?php declare(strict_types=1);

namespace Analytics\Bridges\Nette;

use Analytics\GoogleGa;
use Analytics\GoogleTagManager;
use Analytics\Matomo;
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
        'ga'             => null,
        'gtm'            => null,
        'matomo'         => null,
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

        if ($config['ga']) {
            $builder->addDefinition($this->prefix('ga'))
                ->setFactory(GoogleGa::class, [$config]);
        }

        if ($config['gtm']) {
            $builder->addDefinition($this->prefix('gtm'))
                ->setFactory(GoogleTagManager::class, [$config]);
        }

        if ($config['matomo']) {
            $builder->addDefinition($this->prefix('matomo'))
                ->setFactory(Matomo::class, [$config]);
        }
    }
}
