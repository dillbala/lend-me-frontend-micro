<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends ADMIN_Parent {

    /**
     * Index Page for this controller.
     *
     * Maps to the following URL
     * 		http://example.com/index.php/welcome
     *	- or -
     * 		http://example.com/index.php/welcome/index
     *	- or -
     * Since this controller is set as the default controller in
     * config/routes.php, it's displayed at http://example.com/
     *
     * So any other public methods not prefixed with an underscore will
     * map to /index.php/welcome/<method_name>
     * @see https://codeigniter.com/user_guide/general/urls.html
     *
     */

    public function index()
    {
        $data = $this->session->userData;
        $this->load->view('/template/admin_header');
        $this->load->view('/admin/dashboard',$data);
        $this->load->view('/template/footer');
    }

    public function professionals()
    {

        $response= $this->service_model->getData('/v1/users/?profile_status=1&role=3&noc=0');
        $this->load->view('/template/header');


        if ($response['code']==200)
        {
            $data['users'] = $response['result']['data'];
            $this->load->view('/admin/usersListing',$data);

//            foreach ($data['professionals'] as $professional)
//            {
//                echo "<pre>";print_r($professional);echo "<a href='".base_url()."professional/view/".$professional['userId']."'>view user</a>";
//                echo "<hr>";
//            }

        }
        else{
//            $data['error'] = $response['result']['message'];
//            $this->load->view('/students/noc',$data);
        }

    }


    public function approveUser($userId)
    {
        $response= $this->service_model->putData(array('noc'=>'1'),'/v1/users/'.$userId);
        if ($response['code']==200)
        {
            echo "200";
        }
        else{
            echo $response['result']['message'];
        }

    }


}
