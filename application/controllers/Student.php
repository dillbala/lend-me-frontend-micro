
<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Student extends MY_Controller {

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


    public function documents($user_id)
    {
        $data['title'] = 'Documents';
        $response= $this->service_model->getData('/v1/documents/'.$user_id);
        if ($response['code']==200)
        {
            $data['documents'] = $response['result']['data'];
            $this->load->view('/template/header');
            $this->load->view('/documents/index',$data);
            $this->load->view('/template/footer');
        }
        else{
            $data['error'] = $response['result']['message'];
            $this->load->view('/template/header');
            $this->load->view('/documents/index',$data);
            $this->load->view('/template/footer');
        }


    }


    public function noc()
    {
        $response= $this->service_model->getData('/v1/students/?role=3&noc=0');
        $this->load->view('/template/header');
        if ($response['code']==200)
        {
            $data['students'] = $response['result']['data'];

            $this->load->view('/students/noc',$data);

        }
        else{
            $data['error'] = $response['result']['message'];
            $this->load->view('/students/noc',$data);
        }
        $this->load->view('/template/footer');
    }

    public function view($user_id)
    {
        $response= $this->service_model->getData('/v1/users/'.$user_id);
        $data = $response['result']['data'];
        $data['documents'] = $this->service_model->getData('/v1/documents/'.$user_id)['result']['data'];
        $this->load->view('/template/header');
        $this->load->view('/students/view',$data);
    }


    public function logout() {
        $this->session->unset_userdata('userData');
        $this->session->sess_destroy();
        redirect('/');
    }
}
