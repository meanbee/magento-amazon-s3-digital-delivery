Meanbee Amazon S3 for Downloadable Products Extension
=====================
Did you know that normal downloadable products still go through your server, even if you’ve specified a URL, and so use your own bandwidth?

This module skips Magento when serving the files to your customers, using only the cheaper bandwidth from Amazon, saving your server’s computational resources for your other customers. Your downloadable products will still record the number of downloads the customer uses when going through the “My Account” area of your website.

All generated URLs are time-sensitive, the length of time you’d like the URL to be valid for is configurable in your administration area. The URL can be valid for 5 seconds, or indefinitely. It’s up to you.

All you need to do is: 1. Install the module 2. Enter your Amazon Access and Secret key in the administration area (for making the secure URLs) 3. Upload your downloadable products to S3, making sure you disallow public viewing of your files (so that users can’t just go directly to the URL and get the files for free) 4. Use the S3 URL to your uploaded files to create your downloadable products 5. That’s it! The secure URL will be automatically generated for the customer when they try and download from the “My Downloadable Products” section

The module generates secure URLs using Query String Authentication, or QSA.

##### Compatibility
 Compatibility: 1.6, 1.7, 1.8, 1.9

Support
-------
You are welcome to log any issues you find for community support but the functionality is provided *as is* and we will not be providing support. We will however review pull requests if you provide one.

Contribution
------------
Any contribution is highly appreciated. The best way to contribute code is to open a [pull request on GitHub](https://help.github.com/articles/using-pull-requests).


Licence
-------
[OSL - Open Software Licence 3.0](http://opensource.org/licenses/osl-3.0.php)

Copyright
---------
(c) 2017 Meanbee
