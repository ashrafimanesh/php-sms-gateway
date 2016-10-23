<?php

class kavehnegar extends AbstSMS{
    /**
     * return array of configs
     * @return array
     */
    public static function getCredentials() {
        return env('kavehnegar_credentials');
    }

    public static function getConnectionData() {
        list($apiKey) = self::getCredentials();
        return ['url'=>"http://api.kavenegar.com/v1/$apiKey/sms/send.json"];
    }

    public static function getConnectionType() {
        return self::ConnectionTypeCurl;
    }

    /**
     * map sms data
     * @param \iSMS $SMS
     * @return mixed
     */
    public static function map_data(\iSMS $SMS) {
        list($apiKey,$number) = self::getCredentials();
        $data = array(
            "receptor" => $SMS->getTo(),
            "sender" => $SMS->getFrom() ? $SMS->getFrom() : $number,
            "message" => $SMS->getText(),
            "date" => null,
            "type" => 1,
            "localid" => null
        );
        $headers       = array(
            'Accept: application/json',
            'Content-Type: application/x-www-form-urlencoded',
            'charset: utf-8'
        );
        return ['data'=>$data
//                ,'options'=>[CURLOPT_HTTPHEADER=>$headers]
                ];
    }

}
