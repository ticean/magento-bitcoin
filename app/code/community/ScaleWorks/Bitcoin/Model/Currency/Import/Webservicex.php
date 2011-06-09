<?php
/**
 * Magento
 *
 * NOTICE OF LICENSE
 *
 * This source file is subject to the Open Software License (OSL 3.0)
 * that is bundled with this package in the file LICENSE.txt.
 * It is also available through the world-wide-web at this URL:
 * http://opensource.org/licenses/osl-3.0.php
 * If you did not receive a copy of the license and are unable to
 * obtain it through the world-wide-web, please send an email
 * to license@magentocommerce.com so we can send you a copy immediately.
 *
 * DISCLAIMER
 *
 * Do not edit or add to this file if you wish to upgrade Magento to newer
 * versions in the future. If you wish to customize Magento for your
 * needs please refer to http://www.magentocommerce.com for more information.
 *
 * @category    ScaleWorks
 * @package     ScaleWorks_Bitcoin
 * @copyright   Copyright (c) 2011 ScaleWorks (http://www.scaleworks.co)
 * @license     http://opensource.org/licenses/osl-3.0.php  Open Software License (OSL 3.0)
 */

/**
 * Overrides core Webservicex to add a public convert interface.
 *
 * @category   Mage
 * @package    Mage_Directory
 * @author      Magento Core Team <core@magentocommerce.com>
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
