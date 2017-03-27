<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Upload extends MY_Controller{

    public function index($user_id)
    {
        $data['title'] = 'Data Upload';
        $this->load->view('/template/header');
        $this->load->view('/uploads/index',array('error' => ' ','user_id'=>$user_id));
        $this->load->view('/template/footer');
    }

    public function do_upload()
    {
        $config['upload_path']          = FCPATH.'uploads/';

        $config['allowed_types']        = 'pdf|doc|jpg|jpeg|docs';
//        $config['max_size']             = 100;
//        $config['max_width']            = 1024;
//        $config['max_height']           = 768;

        $this->load->library('upload', $config);

        if ( ! $this->upload->do_upload('userfile'))
        {
            $error = array('error' => $this->upload->display_errors(),'user_id'=>$this->input->post('user_id'));

            $this->load->view('/template/header');
            $this->load->view('uploads/index', $error);
        }
        else
        {
            $user_id = $this->input->post('user_id');
            if($this->session->userdata['role'] == 0 || $this->session->userdata['role'] == 1)
            {
                $type = 2;
            }
            else{
                $type = 1;
            }
            $data = array('path' => $this->upload->data()['full_path'],
                            'user_id'=>$user_id,
                            'type'=>$type
                        );
            $response = $this->service_model->fileData('/v1/documents/',$data);

            if ($response['code']==200)
            {
                $data['documents'] = $response['result']['data'];
                redirect('document/index/'.$user_id);
            }
            else{
                $data['error'] = $response['result']['message'];
                $this->load->view('/template/header');
                $this->load->view('uploads/index', $data);
            }

        }
    }


    public function add()
    {
        $path = $this->input->post('path');
        $type = $this->input->post('type');
        if($type=='salary')
        {
            $this->salary_model->add_salaries($path);
            $data = array('message'=>'Uploaded salaries successfully');
        }
        elseif ($type=='expense')
        {
            $this->expense_model->add_expenses($path);
            $data = array('message'=>'Uploaded expenses successfully');
        }
        elseif ($type=='attendance')
        {
            $this->attendance_model->add_attendances($path);
            $data = array('message'=>'Uploaded attendance successfully');
        }
        $this->load->view('/template/header');
        $this->load->view('uploads/success', $data);
    }


}


