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
 * @category    Mage
 * @package     Mage_Payment
 * @copyright   Copyright (c) 2010 Magento Inc. (http://www.magentocommerce.com)
 * @license     http://opensource.org/licenses/osl-3.0.php  Open Software License (OSL 3.0)
 */


class ScaleWorks_Bitcoin_Model_Payment_Method_Bitcoin extends Mage_Payment_Model_Method_Abstract
{
    /**
     * XML Pathes for configuration constants
     */
    const XML_PATH_PAYMENT_BITCOIN_ACTIVE = 'payment/bitcoin/active';
    const XML_PATH_PAYMENT_BITCOIN_ORDER_STATUS = 'payment/bitcoin/order_status';
    const XML_PATH_PAYMENT_BITCOIN_PAYMENT_ACTION = 'payment/bitcoin/payment_action';

    /**
     * Payment code name
     *
     * @var string
     */
    protected $_code = 'bitcoin';

    /**
     * Check whether method is available
     *
     * @param Mage_Sales_Model_Quote $quote
     * @return bool
     */
    public function isAvailable($quote = null)
    {
        return true;
    }

    /**
     * Get config peyment action
     *
     * @return string
     */
    public function getConfigPaymentAction()
    {
        if ('pending' == $this->getConfigData('order_status')) {
            return Mage_Payment_Model_Method_Abstract::ACTION_AUTHORIZE;
        }
        return parent::getConfigPaymentAction();
    }
}
