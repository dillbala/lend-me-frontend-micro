
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


    public function logout() {
        $this->session->unset_userdata('userData');
        $this->session->sess_destroy();
        redirect('/');
    }
}
