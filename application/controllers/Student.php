
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


    public function index()
    {
        if($this->session->userData->status=0)
        {
            $this->load->view('/template/header');
            $this->load->view('/profile/profile');
            $this->load->view('/template/footer');
        }

        if(($this->session->userData->logged_in)==1)
        {
            $this->load->view('/template/header');
            $this->load->view('/profile/profile');
            $this->load->view('/template/footer');
        }
        else {
            $data['title'] = 'Login Page';
            $this->form_validation->set_rules('password', 'Password', 'required');
            $this->form_validation->set_rules('email', 'Email', 'required');
            if ($this->form_validation->run() === FALSE) {
                $this->load->view('/template/header');
                $this->load->view('/profile/login', $data);
                $this->load->view('/template/footer');
            } else {
                $response = $this->service_model->postData(array('email' => $this->input->post('email'),
                    'password' => $this->input->post('password')
                ), '/v1/users/');
//            echo "<pre>";print_r($response);
//            die();
                if ($response['code'] == 200) {
                    $userData = $response['result']->data;
                    $userData->logged_in = 1;
                    $this->session->set_userdata('userData', $userData);
                    $this->load->view('/template/header');
                    $this->load->view('/profile/profile', $data);
                    $this->load->view('/template/footer');
                } else {
                    $data['error'] = $response['result']->message;
                    $this->load->view('/template/header');
                    $this->load->view('/profile/login', $data);
                    $this->load->view('/template/footer');
                }

            }
        }
    }


    public function logout() {
        $this->session->unset_userdata('userData');
        $this->session->sess_destroy();
        redirect('/');
    }
}
