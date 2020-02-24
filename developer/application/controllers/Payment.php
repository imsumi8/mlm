<?php
defined('BASEPATH') OR exit('No direct script access allowed');
  
class Payment extends CI_Controller {
  
    public function __construct()
    {
        parent::__construct();
        $this->load->database();
        $this->load->library(array('form_validation','session'));
        $this->load->helper(array('url','html','form'));
             
     }
  
    public function index()
    {
        $this->load->view('admin/Razorpay');
    }   
    public function razorPaySuccess()
    { 
     $data = [
               'user_id' => $this->input->post('sponsors'),
               'payment_id' => $this->input->post('razorpay_payment_id'),
               'amount' => $this->input->post('totalAmount'),
               'product_id' => $this->input->post('product_id'),
            ];
     $insert = $this->db->insert('payments', $data);
     $arr = array('msg' => 'Payment successfully credited', 'status' => true);  
     return $arr;
    }
    public function RazorThankYou()
    {
     $this->load->view('admin/razorthankyou');
    }
}