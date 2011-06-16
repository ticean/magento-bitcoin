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


$installer = $this;
$installer->startSetup();

// Currency.
//$installer->run("
//INSERT INTO {$this->getTable('directory_currency_rate')} (`currency_from`, `currency_to`, `rate`) VALUES ('BTC', 'BTC', 1.000000000000),('BTC', 'EUR', 1.000000000000),('BTC', 'USD', 1.415000000000),('USD', 'BTC', 0.706700000000),('EUR', 'BTC', 1.000000000000);
//");


// Quote & Order
$installer->run("
ALTER TABLE `{$this->getTable('sales_flat_quote_payment')}`
   ADD COLUMN `bitcoin_payment_address` varchar(255) NULL
   AFTER `method`;
");

$installer->run("
ALTER TABLE `{$this->getTable('sales_flat_order_payment')}`
   ADD COLUMN `bitcoin_payment_address` varchar(255) NULL
   AFTER `method`;
");

$installer->endSetup();