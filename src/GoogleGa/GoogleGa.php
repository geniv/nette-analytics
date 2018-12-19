<?php declare(strict_types=1);

namespace Analytics;

/**
 * Class GoogleGa
 *
 * @author  geniv
 * @package Analytics
 */
class GoogleGa extends Analytics implements IGoogleGa
{
    const
        INDEX = 'ga';

    /** @var string */
    private $templatePath;


    /**
     * GoogleGa constructor.
     *
     * @param array $parameters
     */
    public function __construct(array $parameters)
    {
        parent::__construct($parameters);

        $this->templatePath = __DIR__ . '/GoogleGa.latte'; // set path
    }


    /**
     * Set template path.
     *
     * @param string $path
     */
    public function setTemplatePath(string $path)
    {
        $this->templatePath = $path;
    }


    /**
     * Render.
     */
    public function render()
    {
        if (isset($this->parameters[self::INDEX]) && $this->parameters['productionMode']) {
            $template = $this->getTemplate();

            $template->ga = $this->parameters[self::INDEX];

            $template->setFile($this->templatePath);
            $template->render();
        } else {
            echo '<!-- Google Analytics -->' . PHP_EOL;
        }
    }
}
