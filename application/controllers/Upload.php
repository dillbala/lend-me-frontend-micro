<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Upload extends MY_Controller{


    public function apply()
    {
        $config['upload_path']          = FCPATH.'uploads/';

        $config['allowed_types']        = 'pdf|jpg|jpeg';
//        $config['max_size']             = 100;
//        $config['max_width']            = 1024;
//        $config['max_height']           = 768;

        $this->load->library('upload', $config);
//        echo "test";

        $paths = array();
        if ( ! $this->upload->do_upload('adharF'))
        {
            $error = array('error' => $this->upload->display_errors());
        }
        else{
            $paths['adharF']=$this->upload->data()['full_path'];
        }

        if ( ! $this->upload->do_upload('adharB'))
        {
            $error = array('error' => $this->upload->display_errors());

        }
        else{
            $paths['adharB']=$this->upload->data()['full_path'];
        }
        if ( ! $this->upload->do_upload('panCard'))
        {
            $error = array('error' => $this->upload->display_errors());

        }
        else{
            $paths['panCard']=$this->upload->data()['full_path'];
        }

        if ( ! $this->upload->do_upload('employeeId'))
        {
            $error = array('error' => $this->upload->display_errors());

        }
        else{
            $paths['employeeId']=$this->upload->data()['full_path'];
        }

        if ( ! $this->upload->do_upload('salarySlip'))
        {
            $error = array('error' => $this->upload->display_errors());

        }
        else{
            $paths['salarySlip']=$this->upload->data()['full_path'];
        }

        if ( ! $this->upload->do_upload('bankStatement'))
        {
            $error = array('error' => $this->upload->display_errors());

        }
        else{
            $paths['bankStatement']=$this->upload->data()['full_path'];
        }
        if (!empty($error))
        {
            $this->load->view('/template/sidebar_header');
            $this->load->view('/details/add',$error);
            $this->load->view('/template/sidebar_footer');
        }

        else
        {
            $user_id = $this->input->post('user_id');

            foreach ($paths as $path=>$pathValue)
            {
                $data = array('path' => $pathValue,
                    'user_id'=>$user_id,
                    'type'=>$path
                );
                $response = $this->service_model->fileData('/v1/documents/',$data);
                if ($response['code']!=200)
                {
                    $error['error'] =  $response['result']['message'];
                    $this->load->view('/template/sidebar_header');
                    $this->load->view('/details/add',$error);
                    $this->load->view('/template/sidebar_footer');
                    break;
                }
            }

            $profile_data = array(
                'role'=>$this->session->userdata['role'],
                'adharNumber'=>$this->input->post('adharNumber'),
                'panNumber'=>$this->input->post('panNumber'),
                'employeeNumber'=>$this->input->post('employeeNumber'),
                'bankName'=>$this->input->post('bankName'),
                'roll_number'=>$this->input->post('roll_number'),
                'branchName'=>$this->input->post('branchName'),
                'ifscCode'=>$this->input->post('ifscCode'),
                'accountNumber'=>$this->input->post('accountNumber')
                );

            $response= $this->service_model->postData($profile_data,'/v1/profiles/');

            if ($response['code']==200)
            {
                $this->session->set_userdata('profile_status',1);
                redirect('profile');
            }
            else {
                $error['error'] =  $response['result']['message'];
                $this->load->view('/template/sidebar_header');
                $this->load->view('/details/add',$error);
                $this->load->view('/template/sidebar_footer');
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


