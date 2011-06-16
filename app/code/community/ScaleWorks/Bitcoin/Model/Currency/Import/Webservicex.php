<?php
/**
 * ScaleWorks Bitcoin
 *
 * NOTICE OF LICENSE
 *
 * This source file is subject to the Open Software License (OSL 3.0)
 * that is bundled with this package in the file LICENSE.txt.
 * It is also available through the world-wide-web at this URL:
 * http://opensource.org/licenses/osl-3.0.php
 * If you did not receive a copy of the license and are unable to
 * obtain it through the world-wide-web, please send an email
 * to license@scaleworks.co so we can send you a copy immediately.
 *
 * @category    ScaleWorks
 * @package     ScaleWorks_Bitcoin
 * @copyright   Copyright (c) 2011 Ticean Bennett (http://www.scaleworks.co)
 * @license     http://opensource.org/licenses/osl-3.0.php  Open Software License (OSL 3.0)
 */

/**
 * Overrides core Webservicex to add a public convert interface. When Bitcoincharts is enable this is used as
 * backup for unsupported currencies.
 *
 * @category   ScaleWorks
 * @package    ScaleWorks_Bitcoin
 * @author     Ticean Bennett <ticean@gmail.com>
 */
class ScaleWorks_Bitcoin_Model_Currency_Import_Webservicex extends Mage_Directory_Model_Currency_Import_Webservicex
{
    /**
     * A public interface for converting currency.
     * @param  $currencyFrom
     * @param  $currencyTo
     * @param int $retry
     * @return void
     */
    public function convert($currencyFrom, $currencyTo, $retry=0) {
        $this->_convert($currencyFrom, $currencyTo, $retry);
    }
}
