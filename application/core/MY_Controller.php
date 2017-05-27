<?php
defined('BASEPATH') OR exit('No direct script access allowed');
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