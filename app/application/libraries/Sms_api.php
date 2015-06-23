<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Sms_api {
 
    //change this to the actual user and password
    private $username = 'username';
    private $password = 'pass';
    private $url      = 'http://cloud.smsindiahub.in/vendorsms/pushsms.aspx';
    private $sid      = 'WEBSMS'; 
     
    public function send_sms( $phone, $text ){
        $url = $this->url . '?user='.urlencode( $this->username ) .
        '&password=' . urlencode( $this->password ) .
        '&msisdn=' . $phone .
	'&sid=' . $sid .
        '&msg=' . urlencode( $text ) .
	'&fl=0';

	$r = file_get_contents($url);
        $obj = json_decode($r,true);

	foreach($obj as $key => $value) {
                if($key == 'ErrorCode')
               // echo $value;
			if($value == 000)
				return true;
			else
				return false;	
	 }

     }         
 
}


?>
