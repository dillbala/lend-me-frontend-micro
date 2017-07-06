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


        // echo $this->session->userdata['profile_pic']);

         // if(empty($this->session->userdata['profile_pic']))
         //        {
         //            // echo "here";


                    
         //        }    



        $this->load->view('/template/sidebar_header');
        $user_data = $this->service_model->getData('/v1/loans/?user_id='.$this->session->userdata['userId'])['result']['data'];
        $profile_status = $this->service_model->getData('/v1/users/'.$this->session->userdata['userId'])['result']['data']['profile_status'];
        $this->session->set_userdata(array('profile_status'=>$profile_status));

if($this->session->userdata['profile_status']==0)
       {
        redirect('profile/capture_picture');
       }

// echo $this->session->userdata['profile_status'];
// die();
//        echo $this->session->userdata['profile_status'];


//        in_array($this->session->userdata['profile_status'],array(0,5,6,7));

       // if($this->session->userdata['profile_status']==0)
       // {
       //  redirect('profile/capture_picture');
       // }


        if(in_array($this->session->userdata['profile_status'],array(0,4,5,6,7,8)))
        {

            if ($this->session->userdata['role']==3)
            {
                $this->load->view('/professionals/completeProfile',array('status'=>$this->session->userdata['profile_status']));
//                $this->load->view('/professionals/profileAdd');
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
        elseif ($this->session->userdata['profile_status']==2 || $this->session->userdata['profile_status']==9 )
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

if(in_array($this->session->userdata['profile_status'],array(2,9)))
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
    else{

            echo 'Your profile is not yet verified';

    }


    }








}


