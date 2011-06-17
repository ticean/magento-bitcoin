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

class ScaleWorks_Bitcoin_Helper_Data extends Mage_Core_Helper_Abstract
{
    const XML_PATH_PAYMENT_BITCOIN_DISPLAY_BASE_CONVERSION = 'payment/bitcoin/display_base_conversion';

    /**
     * Gets configuration setting for whether or not a converted grand total should be displayed on checkout.
     * For now this isn't used. The converted grand total is not displayed for Bitcoin.
     * @return void
     */
    public function getDisplayBaseConversion() {
        //return Mage::getStoreConfigFlag(self::XML_PATH_PAYMENT_BITCOIN_DISPLAY_BASE_CONVERSION);
        return false;
    }
}
