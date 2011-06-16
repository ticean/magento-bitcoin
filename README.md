ScaleWorks_Bitcoin
===============================

A Bitcoin payment module for Magento.

I wrote this module to help promote Bitcoin and to enable vendors to trade goods for bitcoin. While I believe this module
is the most fully featured Magento Bitcoin module available at the moment, please consider this an alpha release.

I'm looking forward to feedback from vendors who are accepting Bitcoin.

-Ticean



DONATIONS
---------------------------
If you find this module useful please consider donating an appropriate amount. It helps me justify the time spent coding
to my wife and daughter, and child soon to be! :)

1CvWfZXUCFowsQb6otfey16FrgVFPZNHrg



Features
---------------------------

- New bitcoin currency and symbol. Full currency support in Magento.
- Currency conversion and conversion rates management. Manually, or daily weighted value from Bitcoincharts service.
- Scheduled conversion rates update is supported.
- Accept bitcoin payment.Orders are accepted in Pending status and set to Processing when the minimum confirmation count is reached.
- Required confirmations is configurable.
- Fully configurable bitcoind parameters.
- Http/Https access to bitcoin (if bitcoind configured for https).
- Generates a new bitcoin address for every order.
- Provides bitcoin payment address to the customer on checkout.


Planned Features
---------------------------

- Assign payment addresses to customer bitcoin accounts.
- More Payment information in Admin order view. (Confirmation counts, etc...)
- Identify orders that have not been paid within a configurable time threshold.
- Improved localization.
- Reports and merchant tools.
- Hell of a lot more...



Some things you should do upon installation...
-----------------------------------------------------

- Magento doesn't provide a good way to override locales, so you will need to manually copy the locale files in /lib/Zend/Locale/Data
- Feel free to call me a lazy American bastard. As of now the only the EN modification is modified. You may need to localize.
- If you've customized your order confirmation page, you might want to revisit. The same applies to transactional emails.


Licensing
---------------------------

Copyright 2011, Ticean Bennett

This work is licensed under the Open Software License (OSL 3.0)
http://opensource.org/licenses/osl-3.0.php
