<?php declare(strict_types=1);

namespace Analytics;

/**
 * Class GoogleTagManager
 *
 * @author  geniv
 * @package Analytics
 */
class GoogleTagManager extends Analytics implements IGoogleTagManager
{
    const
        INDEX = 'gtm';

    /** @var array */
    private $templatePath;


    /**
     * GoogleTagManager constructor.
     *
     * @param array $parameters
     */
    public function __construct(array $parameters)
    {
        parent::__construct($parameters);

        // implicit path
        $this->templatePath = [
            'render' => __DIR__ . '/GoogleTagManager.latte',
            'body'   => __DIR__ . '/GoogleTagManagerBody.latte',
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

            $template->gtm = $this->parameters[self::INDEX];

            $template->setFile($this->templatePath['render']);
            $template->render();
        } else {
            echo '<!-- Google Tag Manager head -->' . PHP_EOL;
        }
    }


    /**
     * Render body.
     */
    public function renderBody()
    {
        if (isset($this->parameters[self::INDEX]) && $this->parameters['productionMode']) {
            $template = $this->getTemplate();

            $template->gtm = $this->parameters[self::INDEX];

            $template->setFile($this->templatePath['body']);
            $template->render();
        } else {
            echo '<!-- Google Tag Manager body -->' . PHP_EOL;
        }
    }
}
