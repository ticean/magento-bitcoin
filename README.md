ScaleWorks Bitcoin
===============================

A Bitcoin payment module for Magento.


Features
---------------------------

- Accept bitcoin payment.
- Fully configurable bitcoind parameters.
- Http/Https access to bitcoin.
- Generate a new bitcoin address for every order.
- Configure total payment confirmations to consider payment complete.
- Currency conversion from USD to Bitcoin.

Planned Features
---------------------------

- Accept Bitcoin as a payment method.
- Provide the payment address to the customer on checkout, and in confirmation email.
- Configurable timeout, after which unpaid orders are cancelled.
- Checks for payment receipt and update status.
- Support for downloadable products.
- Localization support, of course.


Known Issues
---------------------------

- Magento's rate importer is designed for a single rate import. Adding multiple rate imports causes rate errors on the
  existing imports, as they don't have Bitcoins as currency. There's no elegant way to ignore BIT rates when unsupported.

License
---------------------------

TDB