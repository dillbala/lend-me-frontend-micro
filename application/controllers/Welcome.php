<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

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

//        print_r($this->session->userdata);
//        var_dump(isset($this->session->userdata['logged_in']));
//        die();

        if(isset($this->session->userdata['logged_in']) && $this->session->userdata['logged_in']==1)
        {
            $this->load->view('/template/header');
            $this->load->view('/profile/profile');
            $this->load->view('/template/footer');
        }
        else {
            $data['title'] = 'Login';
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
                    $userData = $response['result']['data'];
                    $userData['logged_in'] = 1;
                    $this->session->set_userdata($userData);
                    $this->load->view('/template/header');
                    $this->load->view('/profile/profile', $data);
                    $this->load->view('/template/footer');
                } else {
                    $data['error'] = $response['result']['message'];
                    $this->load->view('/template/header');
                    $this->load->view('/profile/login', $data);
                    $this->load->view('/template/footer');
                }

            }
        }
    }



    public function signup()
    {

        $data['title'] = 'Signup';

        $this->form_validation->set_rules('password','Password','required');
        $this->form_validation->set_rules('email','Email','required');
        if($this->form_validation->run()===FALSE)
        {
            $this->load->view('/template/header');
            $this->load->view('/profile/signup',$data);
            $this->load->view('/template/footer');
        }
        else{
            $postData= array(
                'email'=>$this->input->post('email'),
                'firstName'=>$this->input->post('firstName'),
                'lastName'=>$this->input->post('lastName'),
                'middleName'=>$this->input->post('middleName'),
                'address'=>$this->input->post('address'),
                'mobile'=>$this->input->post('mobile'),
                'nationality'=>$this->input->post('nationality'),
                'password'=>$this->input->post('password'),
                'dob'=>$this->input->post('dob'),
                'role'=>3,
                'register'=>1
            );
            if ($postData['nationality']=="India")
            {
                $postData['mobileCountry']='+91';
            }
            else{
                // need to update it
                $postData['mobileCountry']='+91';
            }
            $response= $this->service_model->postData($postData,'/v1/users/');
            if ($response['code']==200)
            {
                $userData = $response['result']['data'];
                $userData['logged_in']=1;
                $this->session->set_userdata($userData);
                $this->load->view('/template/header');
                $this->load->view('/profile/profile',$data);
                $this->load->view('/template/footer');
            }
            else{
                $data['error'] = $response['result']['message'];
                $this->load->view('/template/header');
                $this->load->view('/profile/signup',$data);
                $this->load->view('/template/footer');
            }

        }
    }

    public function resend($id)
    {

        if($this->session->userdata['userId']==$id)
        {

            $response= $this->service_model->putData(array('userId'=>$id),'/v1/code/');
            $data['message'] = $response['result']['message'];
        }
        else{
            $data['message'] = 'You can not send this request';
        }

        redirect('');

    }

    public function verify()
    {

        if($this->session->userdata['logged_in']==1)
        {
//            echo "<pre>";print_r($this->session->userData);
//            die();

            $response= $this->service_model->postData(array('userId'=>$this->session->userdata['userId'],'code'=>$this->input->post('code')),'/v1/code/');
            if ($response['code']==200)
            {
                $this->session->set_userdata('status',1);
            }
            $data['message'] = $response['result']['message'];
        }
        else{
            $data['message'] = 'You can not send this request';
        }

        redirect('');


    }
    public function logout() {
        $this->session->unset_userdata();
        $this->session->sess_destroy();
        redirect('/');
    }
}
