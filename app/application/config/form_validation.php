<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

$config = array(
    array('field'=>'name',
          'label'=>'Name',
          'rules'=>'required'),
           
    array('field'=>'email',
          'label'=>'Email',
          'rules'=>'required|valid_email|callback_check_email_exists'),
           
    //array('field'=>'country',
    //      'label'=>'Country',
    //      'rules'=>'required'),
           
    array('field'=>'mobile',
          'label'=>'Mobile phone',
          'rules'=>'required|numeric')
 
);

function check_email_exists( $email ){
    $rs = $this->db->where( 'email', $email )->count_all_results('users');
    $this->form_validation->set_message('check_email_exists', "We're sorry, this email already exists!");
    if( $rs < 1 ){
        return true;
    }
    return false;
}

?>
