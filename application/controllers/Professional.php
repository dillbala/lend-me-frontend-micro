<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Professional extends MY_Controller {

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
     * map to /index.html/welcome/<method_name>
     * @see https://codeigniter.com/user_guide/general/urls.html
     *
     */



    public function view($userId)
    {
        if($this->session->userData['userId']==$userId||$this->session->userData['role']==0)
        {
            $user_data = $this->service_model->getData('/v1/users/'.$userId)['result']['data'];
            $userDocumentData = $this->service_model->getData('/v1/documents/'.$userId)['result']['data'];

            $data = array('userData'=>$user_data,'documentData'=>$userDocumentData);

            $this->load->view('/template/admin_header');
            $this->load->view('profile/approve',$data);

        }
        else{
            show_404();
        }



    }



    public function do_upload()
    {
        $config['upload_path']          = FCPATH.'uploads/';

        $config['allowed_types']        = 'pdf|jpg|jpeg|png';
//        $config['max_size']             = 100;
//        $config['max_width']            = 1024;
//        $config['max_height']           = 768;

        $this->load->library('upload', $config);


        $step = $this->input->post('step');
        $user_id = $this->session->userdata('userId');

//        echo $step;
        switch ($step)
        {
            case "step1":
                $paths = array();
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


                if (!empty($error))
                {
                    echo $error['error'];
                }
                else
                {

                    $flag=0;
                    foreach ($paths as $path=>$pathValue)
                    {
                        $data = array('path' => $pathValue,
                            'user_id'=>$user_id,
                            'type'=>$path
                        );
                        $response = $this->service_model->fileData('/v1/documents/',$data);
                        if ($response['code']!=200)
                        {
                            echo $response['result']['message'];
                            $flag=1;
                            break;
                        }
                    }
                    if ($flag!=1)
                    {

                        $profile_data = array(
                            'employeeNumber'=>$this->input->post('employeeNumber')
                        );

                        $response= $this->service_model->postData($profile_data,'/v1/profiles/');
//                        print_r($response);

                        if ($response['code']==200)
                        {
                            echo 200;
                        }
                        else {
                            echo $response['result']['message'];
                        }


                    }
                }
                break;
            case "step2":
                $paths = array();
                if ( ! $this->upload->do_upload('panCard'))
                {
                    $error = array('error' => $this->upload->display_errors());

                }
                else{
                    $paths['panCard']=$this->upload->data()['full_path'];
                }



                if (!empty($error))
                {
                    echo $error['error'];
                }
                else
                {

                    $flag=0;
                    foreach ($paths as $path=>$pathValue)
                    {
                        $data = array('path' => $pathValue,
                            'user_id'=>$user_id,
                            'type'=>$path
                        );
                        $response = $this->service_model->fileData('/v1/documents/',$data);
                        if ($response['code']!=200)
                        {
                            echo $response['result']['message'];
                            $flag=1;
                            break;
                        }
                    }
                    if ($flag!=1)
                    {

                        $profile_data = array(
                            'panNumber'=>$this->input->post('panNumber')
                        );

                        $response= $this->service_model->postData($profile_data,'/v1/profiles/');

                        if ($response['code']==200)
                        {
                            echo 200;
                        }
                        else {
                            echo $response['result']['message'];
                        }


                    }
                }
                break;
            case "step3":
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



                if (!empty($error))
                {
                    echo $error['error'];
                }
                else
                {

                    $flag=0;
                    foreach ($paths as $path=>$pathValue)
                    {
                        $data = array('path' => $pathValue,
                            'user_id'=>$user_id,
                            'type'=>$path
                        );
                        $response = $this->service_model->fileData('/v1/documents/',$data);
                        if ($response['code']!=200)
                        {
                            echo $response['result']['message'];
                            $flag=1;
                            break;
                        }
                    }
                    if ($flag!=1)
                    {

                        $profile_data = array(
                            'adharNumber'=>$this->input->post('adharNumber')
                        );

                        $response= $this->service_model->postData($profile_data,'/v1/profiles/');

                        if ($response['code']==200)
                        {
                            echo 200;
                        }
                        else {
                            echo $response['result']['message'];
                        }


                    }
                }
                break;
            case "step4":
                $paths = array();
                if ( ! $this->upload->do_upload('bankStatement'))
                {
                    $error = array('error' => $this->upload->display_errors());

                }
                else{
                    $paths['bankStatement']=$this->upload->data()['full_path'];
                }



                if (!empty($error))
                {
                    echo $error['error'];
                }
                else
                {

                    $flag=0;
                    foreach ($paths as $path=>$pathValue)
                    {
                        $data = array('path' => $pathValue,
                            'user_id'=>$user_id,
                            'type'=>$path
                        );
                        $response = $this->service_model->fileData('/v1/documents/',$data);
                        if ($response['code']!=200)
                        {
                            echo $response['result']['message'];
                            $flag=1;
                            break;
                        }
                    }
                    if ($flag!=1)
                    {

                        $profile_data = array(
                            'bankName'=>$this->input->post('bankName'),
                            'branchName'=>$this->input->post('branchName'),
                            'ifscCode'=>$this->input->post('ifscCode'),
                            'accountNumber'=>$this->input->post('accountNumber')
                        );

                        $response= $this->service_model->postData($profile_data,'/v1/profiles/');

                        if ($response['code']==200)
                        {
                            echo 200;
                        }
                        else {
                            echo $response['result']['message'];
                        }


                    }
                }
                break;


                case "step5":
                
                    $profile_data = array(
                            'address'=>$this->input->post('address')
                        );

                    $response= $this->service_model->postData($profile_data,'/v1/profiles/');

                    if ($response['code']==200)
                    {
                        echo 200;
                    }
                    else {
                        echo $response['result']['message'];
                    }

                break;










        }

//        if($this->input->post('step'))
//
//
//
//
//        $paths = array();
//        if ( ! $this->upload->do_upload('adharF'))
//        {
//            $error = array('error' => $this->upload->display_errors());
//        }
//        else{
//            $paths['adharF']=$this->upload->data()['full_path'];
//        }
//
//        if ( ! $this->upload->do_upload('adharB'))
//        {
//            $error = array('error' => $this->upload->display_errors());
//
//        }
//        else{
//            $paths['adharB']=$this->upload->data()['full_path'];
//        }
//        if ( ! $this->upload->do_upload('panCard'))
//        {
//            $error = array('error' => $this->upload->display_errors());
//
//        }
//        else{
//            $paths['panCard']=$this->upload->data()['full_path'];
//        }
//
//
//
//        if ( ! $this->upload->do_upload('bankStatement'))
//        {
//            $error = array('error' => $this->upload->display_errors());
//
//        }
//        else{
//            $paths['bankStatement']=$this->upload->data()['full_path'];
//        }
//
//        $user_id = $this->session->userdata('userId');
//        foreach ($paths as $path=>$pathValue)
//        {
//            $data = array('path' => $pathValue,
//                'user_id'=>$user_id,
//                'type'=>$path
//            );
//            $response = $this->service_model->fileData('/v1/documents/',$data);
//            if ($response['code']!=200)
//            {
//                $error['error'] =  $response['result']['message'];
//                $this->load->view('/template/sidebar_header');
//                $this->load->view('/professionals/profileAdd',$error);
//                $this->load->view('/template/sidebar_footer');
//                break;
//            }
//        }
//
////        echo "soewe ewrr";
//
//
//
//
//        if (!empty($error))
//        {
//            $this->load->view('/template/sidebar_header');
//            $this->load->view('/professionals/profileAdd',$error);
//            $this->load->view('/template/sidebar_footer');
//        }
//
//
//
//        else
//        {
//            $user_id = $this->input->post('user_id');
//
//            foreach ($paths as $path=>$pathValue)
//            {
//                $data = array('path' => $pathValue,
//                    'user_id'=>$user_id,
//                    'type'=>$path
//                );
//                $response = $this->service_model->fileData('/v1/documents/',$data);
//                if ($response['code']!=200)
//                {
//                    $error['error'] =  $response['result']['message'];
//                    $this->load->view('/template/sidebar_header');
//                    $this->load->view('/professionals/profileAdd',$error);
//                    $this->load->view('/template/sidebar_footer');
//                    break;
//                }
//            }
//
//            $profile_data = array(
//                'role'=>$this->session->userdata['role'],
//                'adharNumber'=>$this->input->post('adharNumber'),
//                'panNumber'=>$this->input->post('panNumber'),
//                'employeeNumber'=>$this->input->post('employeeNumber'),
//                'bankName'=>$this->input->post('bankName'),
//                'branchName'=>$this->input->post('branchName'),
//                'ifscCode'=>$this->input->post('ifscCode'),
//                'accountNumber'=>$this->input->post('accountNumber')
//            );
//
//            $response= $this->service_model->postData($profile_data,'/v1/profiles/');
//
//            if ($response['code']==200)
//            {
//                $this->session->set_userdata('profile_status',1);
//                redirect('profile');
//            }
//            else {
//                $error['error'] =  $response['result']['message'];
//                $this->load->view('/template/sidebar_header');
//                $this->load->view('/professionals/profileAdd',$error);
//                $this->load->view('/template/sidebar_footer');
//            }
//
//        }
    }
}
