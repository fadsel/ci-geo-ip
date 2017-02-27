# GeoIP2 Codeigniter Library
Codeigniter 3.x Library for accessing all APIs from GeoIP2 webservice client and database reader


## Description ##

This package provides an API for the GeoIP2
[web services](http://dev.maxmind.com/geoip/geoip2/web-services) and
[databases](http://dev.maxmind.com/geoip/geoip2/downloadable). The API also
works with the free
[GeoLite2 databases](http://dev.maxmind.com/geoip/geoip2/geolite2/).

## How to install ##
1.Download this archieve 
[phar archive](http://php.net/manual/en/book.phar.php) containing all of the
dependencies for GeoIP2 from their release page 
[the releases page](https://github.com/maxmind/GeoIP2-php/releases).

Place it inside  ```application/vendor/geo/``` folder or any other folder you wish
Make sure you update your database path in the library if you decide to place it else where
 
2.Download the City Database for free from here 
[GeoLite2 databases](http://dev.maxmind.com/geoip/geoip2/geolite2/).


## How to Use ##
You can let the library guess your location

```php
<?php

class YourAwesomeController extends CI_Controller{
    public function get_geo(){
        
        $this->load->library("CI_GeoIp2");
        $reader = new CI_GeoIp2();
        $reader->setIp();
        
        print_r($reader->getCountry()); // Prints out "Tanzania" or any other country you are in
        

    }
}

```

or you can pass in any IP

```php
 
        $this->load->library("CI_GeoIp2");
        $reader = new CI_GeoIp2();
        $reader->setIp("123.456.789.10");
        
        //if you want to manually extract objects
        var_dump($reader->getRawRecord()); 
 
```

## Requirements  ##

This code requires PHP 5.3 or greater. Older versions of PHP are not
supported. 

## Copyright and License ##

This software is Copyright (c) 2017 by Yote Yote

