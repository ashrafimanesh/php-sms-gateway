<?php

/**
 * Abstract class for sms service
 *
 * @author ramin ashrafimanesh <ashrafimanesh@gmail.com>
 */
abstract class AbstSMS {
    
    protected $host,$url='';
    
    public abstract static function send(iSMS $SMS);
    
    public abstract static function sends(arrayiSMS $arr);
    
    public abstract static function getCredentials();
    

    public static function getConnection($type='curl',$params=array()) {
        return Connector::connect($type, $params);
    }

    public function setHost($host) {
        $this->host = $host;
    }

    public function setUrl($url) {
        $this->url = $url;
    }
    
    public function getHost() {
        return $this->host;
    }

    public function getUrl() {
        return $this->url;
    }

}
/**
 * main class for send sms with dynamic gateway name
 */
class SMS{
    /**
     * send sms via gateway
     * @param string $gateway gateway name. List of available gateway name is in config.php file
     * @param iSMS $iSMS object of sms
     * @return type
     */
    public static function send($gateway,iSMS $iSMS){
        $gatewaies= require_once 'config.php';
        if(isset($gatewaies[$gateway])){
            require_once $gatewaies[$gateway][0];
            $class= $gatewaies[$gateway][1];
            return $class::send($iSMS);
        }
        die('invalid sms gateway');
    }
}
/**
 * clas for content of sms params
 */
class iSMS{
    protected $from,$to,$text;
    public function getFrom() {
        return $this->from;
    }

    public function getTo() {
        return $this->to;
    }

    public function getText() {
        return $this->text;
    }

    public function setFrom($from) {
        $this->from = $from;
    }

    public function setTo($to) {
        $this->to = $to;
    }

    public function setText($text) {
        $this->text = $text;
    }
}

class arrayiSMS{
    public static $array_iSMS=[];
    
    public static function addiSMS(iSMS $iSMS){
        self::$array_iSMS[]=$iSMS;
    }
    
    public function getArrayiSMS(){
        return self::$array_iSMS;
    }
}
