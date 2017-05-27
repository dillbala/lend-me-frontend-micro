<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Apply extends MY_Controller{

//
//    function __construct()
//    {
//
//        echo "Forst placw";
//    }

    public function index()
    {


        $this->load->view('/template/sidebar_header');
        $user_data = $this->service_model->getData('/v1/loans/?user_id='.$this->session->userdata['userId'])['result']['data'];
        if($this->session->userdata['profile_status']==0)
        {

            if ($this->session->userdata['role']==3)
            {
                $this->load->view('/professionals/profileAdd');
            }
            elseif ($this->session->userdata['role']==4)
            {
                $this->load->view('/students/profileAdd');
            }
            else{
                show_404();
            }


        }
        elseif ($this->session->userdata['profile_status']==1)
        {
            $this->load->view('/profile/underReview');

        }
        elseif ($this->session->userdata['profile_status']==2)
        {

            if ($this->session->userdata['role']==3)
            {
                $this->load->view('/professionals/selectLoan',$user_data);
            }
            elseif ($this->session->userdata['role']==4)
            {
                $this->load->view('/students/selectLoan',$user_data);
            }
            else{
                show_404();
            }

        }
        $this->load->view('/template/sidebar_footer');
        
    }

    public function applyLoan()
    {

        $amount = $this->input->post('ex1');
        $days = $this->input->post('ex2');



        $response= $this->service_model->postData(array('amount'=>$amount,'days'=>$days),'/v1/loans/');
        if ($response['code']==200)
        {
            echo "200";
        }
        else{
            echo $response['result']['message'];
        }

    }








}


