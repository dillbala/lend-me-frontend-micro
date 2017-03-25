<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Instructor extends MY_Controller{


    public function index()
    {
        $data['title'] = 'Instructors';
        $response= $this->service_model->getData('/v1/instructors/');
        if ($response['code']==200)
        {
                $data['instructors'] = $response['result']['data'];
                $this->load->view('/template/header');
                $this->load->view('/instructor/index',$data);
                $this->load->view('/template/footer');
        }
        else{
            $data['error'] = $response['result']['message'];
            $this->load->view('/template/header');
            $this->load->view('/instructor/index',$data);
            $this->load->view('/template/footer');
        }

    }
    public function view($id = NULL){
        $response= $this->service_model->getData('/v1/users/'.$id);
        if ($response['code']==200)
        {
            $data['instructor'] = $response['result']['data'];
            $this->load->view('/template/header');
            $this->load->view('/instructor/view',$data);
            $this->load->view('/template/footer');
        }
        if(empty($data['instructor'])){
            show_404();
        }
    }

    public function add()
    {
        if ($this->session->userdata['role']!=0&&$this->session->userdata['role']!=1)
        {
            show_404();
        }
        else{

            $data['title'] = 'Add Instructor';
            $this->form_validation->set_rules('firstName','Name','required');
            $this->form_validation->set_rules('lastName','Name','required');
            $this->form_validation->set_rules('email','Email','required');
            $this->form_validation->set_rules('password','password','required');
            if($this->form_validation->run()===FALSE)
            {
                $this->load->view('/template/header');
                $this->load->view('/instructor/add');
                $this->load->view('/template/footer');
            }
            else{
                $postData= array(
                    'email'=>$this->input->post('email'),
                    'firstName'=>$this->input->post('firstName'),
                    'lastName'=>$this->input->post('lastName'),
                    'middleName'=>$this->input->post('middleName'),
                    'password'=>$this->input->post('password'),
                    'role'=>2,
                    'register'=>1
                );
                $response= $this->service_model->postData($postData,'/v1/users/');

                if ($response['code']==200)
                {
                    redirect('instructor/index');
//                $this->load->view('/template/header');
//                $this->load->view('/instructor/index');
//                $this->load->view('/template/footer');
                }
                else{
                    $data['error'] = $response['result']['message'];
                    $this->load->view('/template/header');
                    $this->load->view('/instructor/add',$data);
                    $this->load->view('/template/footer');
                }

            }

        }
    }


    public function edit($id)
    {
        $data['instructor'] = $this->instructor_model->get_instructors($id);
        if (empty($data['instructor']))
        {
            show_404();
        }
        $data['Title'] = "Edit Instructor";
        $this->load->view('/template/header');
        $this->load->view('/instructor/edit',$data);
        $this->load->view('/template/footer');
    }
    public function update()
    {
        $this->instructor_model->update_instructor();
        redirect('instructor');
    }

    public function delete($id)
    {
        if ($this->session->userdata['role']!=0&&$this->session->userdata['role']!=1)
        {
            show_404();
        }
        else{
            $response= $this->service_model->deleteData('/v1/users/'.$id);
            if ($response['code']==200)
            {
                redirect('instructor');
            }
            else{
                show_404();
            }

        }

    }

}


