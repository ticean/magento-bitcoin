Bitcoin. For Magento.
==================================
This is a Bitcoin payment module for Magento.

I wrote this module to help promote Bitcoin and to enable vendors to trade goods for bitcoin. While I believe this module
is the most fully featured Magento Bitcoin module available at the moment, please consider this an alpha release.

I'm looking forward to feedback from vendors who are accepting Bitcoin.

-Ticean



DONATIONS
---------------------------
If you find this module useful please consider donating an appropriate amount. It helps me justify the time spent coding
to my wife and daughter, and child soon to be! :)

1CvWfZXUCFowsQb6otfey16FrgVFPZNHrg



Current Features
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
- Configurable setting to display a converted grand total on checkout. (Ex: Display grand total in USD.)


Planned Features
---------------------------

- Assign payment addresses to customer bitcoin accounts.
- Improve checkout flow (with suggestions from store owners).
- More Payment information in Admin order view. (Confirmation counts, etc...)
- Identify orders that have not been paid within a configurable time threshold.
- Improved localization.
- Reports and merchant tools.
- Add "We Accept Bitcoin" and "Pay With Bitcoin" logos.
- Hell of a lot more...



Some things you should do upon installation...
-----------------------------------------------------

- Magento doesn't provide a good way to override locales, so you will need to manually copy the locale files in /lib/Zend/Locale/Data
- Call me a lazy American bastard. As of now, only the EN Locale is modified. Submitted locales will be incorporated.
- If you've customized your order confirmation page, you might want to revisit. The same applies to transactional emails.



Feedback & Contributing
---------------------------
All feedback is welcome. I'm especially looking forward to feedback from Magento store owners. If you have a feature you'd
like to see implemented please let me know.

Developers, please feel free to comment and contribute. I'll gladly pull reasonable changes and you will be credited.



Licensing
---------------------------

Copyright 2011, Ticean Bennett

This work is licensed under the Open Software License (OSL 3.0)
http://opensource.org/licenses/osl-3.0.php
