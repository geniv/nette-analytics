<?php declare(strict_types=1);

namespace Analytics;

/**
 * Interface IAnalytics
 *
 * @author  geniv
 * @package Analytics
 */
interface IAnalytics
{

    /**
     * Set locale code.
     *
     * @param string $code
     */
    public function setLocaleCode(string $code);
}
