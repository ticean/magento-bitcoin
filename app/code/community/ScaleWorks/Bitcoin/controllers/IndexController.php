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

class ScaleWorks_Bitcoin_IndexController extends Mage_Core_Controller_Front_Action
{
    /**
     * Index action
     */
    public function indexAction()
    {
        $bitcoin = Mage::getModel('bitcoin/bitcoin');
        echo "<pre>\n";
        print_r($bitcoin->getInfo());
        echo "</pre>";

        echo "Getting new address:<br/>";
        echo $bitcoin->getNewAddress('customer1290');
    }

    public function observerAction() {
        $observer = new ScaleWorks_Bitcoin_Model_Observer();
        $observer->fetchConfirmations();
    }

}
