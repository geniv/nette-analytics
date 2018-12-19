<?php declare(strict_types=1);

namespace Analytics;

use GeneralForm\ITemplatePath;


/**
 * Interface IMatomo
 *
 * @author  geniv
 * @package Analytics
 */
interface IGoogleTagManager extends ITemplatePath
{

    /**
     * Set template path.
     *
     * @param string $path
     */
    public function setTemplatePathBody(string $path);
}
