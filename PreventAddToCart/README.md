# Mage2 Module Nadeem PreventAddToCart

    ``nadeem/module-preventaddtocart``

 - [Main Functionalities](#markdown-header-main-functionalities)
 - [Installation](#markdown-header-installation)
 - [Configuration](#markdown-header-configuration)
 - [Specifications](#markdown-header-specifications)
 - [Attributes](#markdown-header-attributes)


## Main Functionalities
Magento2 extension to prevent add to cart action if customer is not logged in.

## Installation
\* = in production please use the `--keep-generated` option

### Type 1: Zip file

 - Unzip the zip file in `app/code/Nadeem`
 - Enable the module by running `php bin/magento module:enable Nadeem_PreventAddToCart`
 - Apply database updates by running `php bin/magento setup:upgrade`\*
 - Flush the cache by running `php bin/magento cache:flush`

### Type 2: Composer

 - Make the module available in a composer repository for example:
    - private repository `repo.magento.com`
    - public repository `packagist.org`
    - public github repository as vcs
 - Add the composer repository to the configuration by running `composer config repositories.repo.magento.com composer https://repo.magento.com/`
 - Install the module composer by running `composer require nadeem/module-preventaddtocart`
 - enable the module by running `php bin/magento module:enable Nadeem_PreventAddToCart`
 - apply database updates by running `php bin/magento setup:upgrade`\*
 - Flush the cache by running `php bin/magento cache:flush`


## Configuration

 - is_enable (prevent_addtocart/general/is_enable)


## Specifications

 - Helper
	- Nadeem\PreventAddToCart\Helper\Data

 - Observer
	- checkout_cart_product_add_after > Nadeem\PreventAddToCart\Observer\Frontend\Checkout\CartProductAddAfter


## Attributes



