<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Details extends MY_Controller{


    public function index()
    {


        $this->load->view('/template/sidebar_header');
        $this->load->view('/details/add');
        $this->load->view('/template/sidebar_footer');

//        $response= $this->service_model->getData('/v1/instructors/');
//        if ($response['code']==200)
//        {
//            $data['instructors'] = $response['result']['data'];
//            $this->load->view('/template/header');
//            $this->load->view('/instructor/index',$data);
//            $this->load->view('/template/footer');
//        }
//        else{
//            $data['error'] = $response['result']['message'];
//            $this->load->view('/template/header');
//            $this->load->view('/instructor/index',$data);
//            $this->load->view('/template/footer');
//        }

    }








}


