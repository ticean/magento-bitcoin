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
 * @copyright   Copyright (c) 2011 ScaleWorks, Ticean Bennett (http://www.scaleworks.co)
 * @license     http://opensource.org/licenses/osl-3.0.php  Open Software License (OSL 3.0)
 */

/**
 * Flat sales order collection with modifications for filtering by payment type and status.
 *
 */
class ScaleWorks_Bitcoin_Model_Mysql4_Sales_Order_Collection extends Mage_Sales_Model_Mysql4_Order_Collection
{

    /**
     * Add filter by specified payment method(s).
     *
     * @param string|array $payment_method
     * @return Mage_Sales_Model_Mysql4_Order_Collection
     */
    public function addPaymentMethodToFilter($payment_method)
    {
        $payment_method = (is_array($payment_method)) ? $payment_method : array($payment_method);
        $this->getSelect()->joinInner(
            array('sop' => $this->getTable('sales/order_payment')),
            'main_table.entity_id = sop.parent_id',
            array()
        )->where('sop.method IN(?)', $payment_method);
        $select = $this->getSelectSql(true);
        return $this;
    }

//    /**
//     * Add filter by specified recurring profile id(s)
//     *
//     * @param string|array $status
//     * @return Mage_Sales_Model_Mysql4_Order_Collection
//     */
//    public function addStatusFilter($status)
//    {
//        $status = (is_array($status)) ? $status : array($status);
//        $this->getSelect()->joinInner(
//            array('srpo' => $this->getTable('sales/recurring_profile_order')),
//            'main_table.entity_id = srpo.order_id',
//            array()
//        )->where('srpo.profile_id IN(?)', $status);
//        return $this;
//    }
}
