<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');

/**
 *
 * @package       CodeIgniter
 * @subpackage    Libraries
 * @category      CI_GeoIp2
 * @author        Fahad Kassim <fahad@yoteyote.com>
 *
 * https://github.com/fadsel/ci-geo-ip/
 */

require APPPATH.'vendor/geo/geoip2.phar';
use GeoIp2\Database\Reader;

class CI_GeoIp2 {

    protected $record;
    protected $ip;
    protected $database_path = 'vendor/geo/GeoLite2-City.mmdb'; //default
    protected $ci;
    public function __construct() {

        //by default
        $this->ci =& get_instance();
        log_message('debug', "Codeigniter GeoIP Class Initialized");

    }

    /**
     * Setting Custom IP
     * @param $ip
     */
    public function setIp($ip = null){

        $reader = new Reader($this->database_path);

        if ($this->ci->input->valid_ip($ip)) {

            //set
            $this->record = $reader->city($ip);

        }else{

            $this->ip = $this->ci->input->ip_address();
            if($this->ip == "127.0.0.1"){
                echo "127.0.0.1 is not supported";
                die();
            }

            //get server's ip instead
            $this->record = $reader->city($this->ip);

        }

    }

    /**
     * getIp
     * @return Ip Address
     */
    function getIp(){
        return $this->ip;
    }


    /**
     * getState()
     * @return state
     */
    public function getState() {
        return $this->record->mostSpecificSubdivision->name;
    }


    /**
     * getState()
     * @return country code "TZ etc"
     */
    public function getCountryCode() {
        return $this->record->country->isoCode;
    }


    /**
     * getCity()
     * @return city name
     */
    public function getCity() {
        return $this->record->city->name;
    }


    /**
     * getZipCode()
     * @return Zip Code (#)
     */
    public function getZipCode() {
        return $this->record->postal->code;
    }

    /**
     * getCountryName
     * @return CountryName
     */

    public function getCountry(){
        return $this->record->raw['country']['names']['en'];
    }


    /**
     * getTimeZone
     *
     * @return Timezone e.g "Africa/Dar_Es_Salaam"
     */
    public function getTimezone(){
        return $this->record->raw['location']['time_zone'];
    }


    /**
     * getRawRecord()
     * (if you want to manually extract objects)
     *
     * @return object of all items
     */
    public function getRawRecord() {
        return $this->record;

    }

}
