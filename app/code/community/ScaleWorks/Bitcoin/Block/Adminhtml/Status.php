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
 * Gets status from Bitcoind.
 *
 * @category    ScaleWorks
 * @package     ScaleWorks_Bitcoin
 * @author      Ticean Bennett <ticean@gmail.com>
 */
class ScaleWorks_Bitcoin_Block_Adminhtml_Status extends Mage_Adminhtml_Block_Abstract
{
    private $_bitcoin = null;

    protected function getBitcoinInstance() {
        if(!$this->_bitcoin) {
            $this->_bitcoin = Mage::getSingleton('bitcoin/bitcoin');
        }
        return $this->_bitcoin;
    }

    protected function getInfo() {
        try {
            $info = $this->getBitcoinInstance()->getInfo();
        }
        catch (Exception $e) {
            $info = false;
        }
        return $info;
    }

}
