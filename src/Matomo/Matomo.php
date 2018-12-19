<?php declare(strict_types=1);

namespace Analytics;

/**
 * Class Matomo
 *
 * @author  geniv
 * @package Analytics
 */
class Matomo extends Analytics implements IMatomo
{
    const
        INDEX = 'matomo';

    /** @var array */
    private $templatePath;


    /**
     * Matomo constructor.
     *
     * @param array $parameters
     */
    public function __construct(array $parameters)
    {
        parent::__construct($parameters);

        // implicit path
        $this->templatePath = [
            'render' => __DIR__ . '/Matomo.latte',
            'body'   => __DIR__ . '/MatomoBody.latte',
        ];
    }


    /**
     * Set template path.
     *
     * @param string $path
     */
    public function setTemplatePath(string $path)
    {
        $this->templatePath['render'] = $path;
    }


    /**
     * Set template path.
     *
     * @param string $path
     */
    public function setTemplatePathBody(string $path)
    {
        $this->templatePath['body'] = $path;
    }


    /**
     * Render.
     */
    public function render()
    {
        if (isset($this->parameters[self::INDEX]) && $this->parameters['productionMode']) {
            $template = $this->getTemplate();

            $template->siteId = $this->parameters[self::INDEX]['siteId'];
            $template->url = $this->parameters[self::INDEX]['url'];

            $template->setFile($this->templatePath['render']);
            $template->render();
        } else {
            echo '<!-- Matomo head -->' . PHP_EOL;
        }
    }


    /**
     * Render body.
     */
    public function renderBody()
    {
        if (isset($this->parameters[self::INDEX]) && $this->parameters['productionMode']) {
            $template = $this->getTemplate();

            $template->siteId = $this->parameters[self::INDEX]['siteId'];
            $template->url = $this->parameters[self::INDEX]['url'];

            $template->setFile($this->templatePath['body']);
            $template->render();
        } else {
            echo '<!-- Matomo body -->' . PHP_EOL;
        }
    }
}
