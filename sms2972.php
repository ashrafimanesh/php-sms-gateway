<?php
namespace phpSMSGateway;

class sms2972 extends AbstSMS{

    /**
     * return array of configs
     * @return array
     */
    public static function getCredentials() {
        return \phpAdditionalFunction\env('sms2972_credentials');
    }


    public static function getConnectionData() {
        return ['url'=>"http://www.2972.ir/api"];
    }
    
    /**
     * map sms data
     * @param \iSMS $SMS
     * @return mixed
     */
    public static function map_data(iSMS $SMS) {
        list($username, $password, $number) = self::getCredentials();
        $port = 0;
        $flash = false;
        $data=array(
            'username'  => $username,
            'password'  => $password,
            'number'    => $SMS->getFrom() ? $SMS->getFrom() : $number,
            'recipient' => $SMS->getTo(),
            'port'      => $port,
            'message'   => $SMS->getText(),
            'flash'     => $flash
        );
        return ['data'=>$data];
    }

    public static function getConnectionType() {
        return self::ConnectionTypeCurl;
    }

}