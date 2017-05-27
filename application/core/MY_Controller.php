<?php
defined('BASEPATH') OR exit('No direct script access allowed');
date_default_timezone_set('Asia/Kolkata');
class MY_Controller extends CI_Controller {

    function __construct()
    {
        parent::__construct();



        if (!empty($this->session->userdata['logged_in']))
        {
            if(($this->session->userdata['logged_in'])!=1)
            {
                redirect('');
            }
            $length = strlen('/profile');
            $newStr = substr($_SERVER['REQUEST_URI'],0,$length);
            if($newStr!='/profile')
            {
                    if(empty($this->session->userdata['profile_pic']))
                        {

                        redirect('profile/');
                    }
            }
        }
        else{
            redirect('');
        }


    }
}


class ADMIN_Parent extends CI_Controller {

    function __construct()
    {
        parent::__construct();

        if (!empty($this->session->userdata['logged_in']))
        {
            if(($this->session->userdata['logged_in'])!=1 && ($this->session->userdata['role'])!=0)
            {
                redirect('');
            }
        }
        else{
            redirect('');
        }


    }
}