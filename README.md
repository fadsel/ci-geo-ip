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

Well you can also try the game below
 <a href="https://play.google.com/store/apps/details?id=com.fadsel.stickybubble">
<img src="https://raw.githubusercontent.com/fadsel/Read-CSV/master/sticky-bubble-cover2.jpg" style="100%"/>
</a>

## License
This software is Copyright (c) 2017 by Safi Cloud 
<a rel="license" href="http://creativecommons.org/licenses/by-sa/4.0/"><img alt="Creative Commons License" style="border-width:0" src="https://i.creativecommons.org/l/by-sa/4.0/88x31.png" /></a><br /><span xmlns:dct="http://purl.org/dc/terms/" href="http://purl.org/dc/dcmitype/Text" property="dct:title" rel="dct:type">CI GEO IP2</span> by <a xmlns:cc="http://creativecommons.org/ns#" href="https://saficloud.com" property="cc:attributionName" rel="cc:attributionURL">Safi Cloud</a> is licensed under a <a rel="license" href="http://creativecommons.org/licenses/by-sa/4.0/">Creative Commons Attribution-ShareAlike 4.0 International License</a>.<br />Permissions beyond the scope of this license may be available at <a xmlns:cc="http://creativecommons.org/ns#" href="https://saficloud.com/legal" rel="cc:morePermissions">saficloud.com/legal</a>.



