CHANGE LOG
==========


## V4.1 (03/12/2023)

* Add provisional PHP 8.3 support
* Add provisional Laravel 11 support


## V4.0 (25/02/2023)

* Support PHP 7.4-8.2 only
* Support PHPUnit 9-10 only
* Support Laravel 8-10 only
* `FacadeTrait` methods `getFacadeAccessor`, `getFacadeClass`, `getFacadeRoot` and `getServiceProviderClass` are now `static`
* `ServiceProviderTrait::getServiceProviderClass` is now `static` and no longer receives app as param 1
* Added property and return types in all places


## V3.4.1 (25/02/2023)

* Removed incorrect PHPUnit 10 support after they made breaking changes before release


## V3.4 (24/01/2022)

* Support Laravel 9 too


## V3.3.2 (21/11/2021)

* Updated package metadata


## V3.3.1 (17/10/2021)

* Provisional PHP 8.1 support


## V3.3 (29/03/2021)

* Support PHPUnit 10 too
* Remove app from getServiceProviderClass definition but not calls


## V3.2.2 (25/07/2020)

* Officially support Laravel 5.5-8


## V3.2.1 (13/07/2020)

* Corrected composer.json


## V3.2 (13/07/2020)

* Provisional PHP 8.0 support


## V3.1.3 (13/04/2020)

* Updated funding information


## V3.1.2 (01/03/2020)

* Miscellaneous tweaks


## V3.1.1 (31/12/2019)

* Don't crash if PHPUnit is not loaded


## V3.1 (26/12/2019)

* Add assertArraySubset
* Support PHPUnit 9 too


## V3.0.5 (26/08/2019)

* Clarified compat with Laravel 6


## V3.0.4 (23/08/2019)

* Support PHP 7.0 - 7.4 only


## V3.0.3 (30/06/2019)

* Avoided deprecated code


## V3.0.2 (16/02/2019)

*  Fixed assertInternalType usage


## V3.0.1 (16/02/2019)

* Fixes for PHPUnit 8


## V3.0 (02/01/2018)

* Removed BC layer


## V2.0 (06/08/2017)

* Supports PHP 7.0, 7.1, 7.2
* Supports PHPUnit 6
* Added some type hints


## V1.1.2 (01/01/2017)

* Load the helper trait if not loaded already


## V1.1.1 (30/01/2016)

* Fixed some typos


## V1.1 (14/11/2015)

* Updated version constraints


## V1.0.1 (06/10/2015)

* Minor tweaks


## V1.0 (26/06/2015)

* Initial release
