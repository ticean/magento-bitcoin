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
 * Onepage checkout totals review block. Overridden to removing "your card will be charged" messaging that's shown when
 * the checkout currency doesn't match the base currency.
 *
 * @category    ScaleWorks
 * @package     ScaleWorks_Bitcoin
 * @author      Ticean Bennett <ticean@gmail.com>
 */
class ScaleWorks_Bitcoin_Block_Checkout_Cart_Totals extends Mage_Checkout_Block_Cart_Totals
{
    /**
     * Check if we have to display grand total in base currency.
     * Overridden to allow admin to configure displaying a conversion or not.
     * @return bool
     */
    public function needDisplayBaseGrandtotal()
    {
        $quote  = $this->getQuote();
        if ($quote->getBaseCurrencyCode() != $quote->getQuoteCurrencyCode()) {
            if($quote->getQuoteCurrencyCode() == 'BTC'){
                return Mage::helper('bitcoin')->getDisplayBaseConversion();
            }
            return true;
        }
        return false;
    }

    public function getIsBitcoinPayment() {
        if($this->getQuote()->getPayment()->getMethodInstance()->getCode() == 'bitcoin'){
            return true;
        }
        return false;
    }

}
