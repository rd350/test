<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');



class Signup extends CI_Controller {
 
   // function Signup(){
   //     parent::Controller();
   // }

    public function __construct()
       {
            parent::__construct();
         
       }
     
   public function index(){
        if( get_cookie('signed') ){
            redirect('signup/activate');
        }
       // $this->config->load('countries', true);
       // $data['countries'] = $this->config->item('countries');
         
        $this->load->view('signup');

    }
     
    public function process(){
        $this->load->library('form_validation');
         
        if ( $this->form_validation->run() ){
         
            $signup = array();
            $signup['name'] = $this->input->post('name');
            $signup['email'] = $this->input->post('email');
          //  $signup['country'] = $this->input->post('country');
            $signup['mobile'] = $this->input->post('mobile');
            //generate the unique activation code
            mt_rand();
            $signup['activation'] = rand( 11111, 99999 );
             
            //insert into db
            $this->db->insert('users', $signup );
             
            //send auth sms
            
          //  $this->input->post('country') == 1 )
            $this->load->library('sms_api');
            $this->sms_api->send_sms( $signup['mobile'], $signup['activation'] );
             
            set_cookie('signed', $this->db->insert_id(), 86500 );
            //redirect
            redirect('signup/activate');                    
             
        } else {
           // $this->config->load('countries', true);
           // $data['countries'] = $this->config->item('countries');
             
            $this->load->view('signup');          
        }   
    }
         
    public function check_email_exists( $email ){
        $rs = $this->db->where( 'email', $email )->count_all_results('users');
        $this->form_validation->set_message('check_email_exists', 'We\'re sorry, this email already exists!');
        if( $rs < 1 ){
            return true;
        }
        return false;
    }
     
    public function activate(){
        if( !get_cookie('signed') ){
            redirect('signup');
        }
         
        $data['error'] = '';
         
        if( $this->input->post('signup') ){
            //if sent
            $where =  array('uid'=>get_cookie('signed'),'activation'=>$this->input->post('code') );
            $result = $this->db->where( $where )->count_all_results('users');
            if( $result < 1 ){
                $data['error'] = '<div class="error">The authorization code is not correct!</div>';
            } else {
                delete_cookie('signed');
                $this->db->set( array('active'=>1, 'activation'=>'') )->where('uid', get_cookie('signed') )->update('users');
                 
                redirect('signup/success');
            }           
        }
         
        $this->load->view('activate', $data);   //$data
    }
     
    public function success(){
        $this->load->view('success');
    }
}

?>
