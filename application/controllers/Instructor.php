<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Instructor extends MY_Controller{


    public function timeDiff($time,$date)
    {
        $time = explode('-',$time)[0];
        $date1=date_create($date);
        $date2=date_create(date('Y-m-d'));
        $diff=date_diff($date2,$date1);
        $day = $diff->format("%R%a");
        if ($day[0]=='+' && $day[1]!=0)
        {
            return true;
        }
        if ($day[0]=='+' && $day[1]==0)
        {
            $time = DateTime::createFromFormat('H:i a', $time)->getTimestamp();
            $currentTime = time();
            if (($time-$currentTime)/3600>0.5)
            {
                return true;
            }


        }
        return false;
    }


    public function classes()
    {
        $user_id = $this->session->userdata['userId'];
        $date = date('Y-m-d');
        $lastDate = date('Y-m-d',strtotime("+7 day"));
        $query = '';
        $query.='&start_date='.$date.'&end_date='.$lastDate.'&instructor_id='.$user_id;

        $classes= $this->service_model->getData('/v1/timeslots/?'.$query)['result']['data'];
        $groupedClasses= array();
        foreach ($classes as $class )
        {
            if ($class['student_id']!=null and $class['student_id']!='')
            {
                $studentData = $this->service_model->getData('/v1/users/'.$class['student_id'])['result']['data'];
                $class['studentName'] = $studentData['firstName'].' '.$studentData['lastName'];
                $class['email'] = $studentData['email'];
            }
            if (!array_key_exists($class['date'],$groupedClasses))
            {
                $groupedClasses[$class['date']] = array();
            }
            if($this->timeDiff($class['slot_id'],$class['date']))
            {
                $class['cancel']=1;
            }
            else{
                $class['cancel']=0;
            }
            array_push($groupedClasses[$class['date']],$class);
        }
        $data['classes'] = $groupedClasses;
        $this->load->view('/template/header');
        $this->load->view('/instructor/classes',$data);
        $this->load->view('/template/footer');
    }

    public function cancelClass($classId)
    {
        echo $this->service_model->putData(array('instructor_id'=>$this->session->userdata['userId']),'/v1/timeslots/'.$classId)['result']['message'];
    }
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


    public function request($instructor_id)
    {
        $user_id = $this->session->userdata['userId'];

        $response = $this->service_model->postData(
                                                    array(
                                                        'userId' => $user_id,
                                                        'instructorId' => $instructor_id,
                                                        'type'=>'addRequest'
                                                         ),
                                                    '/v1/instructors/'

                                                  );

        $this->load->view('/template/header');
        $this->load->view('/uploads/success',array('message'=>$response['result']['message']));
        $this->load->view('/template/footer');

    }

    public function calendar()
    {
        $this->load->view('/template/header');
        $this->load->view('/calendar/index');
    }

    public function addSlots()
    {
        $user_id = $this->session->userdata['userId'];
        $response = $this->service_model->postData(
            array(
                'instructor_id' => $user_id,
                'status_instructor' =>1,
                'date'=>$this->input->post('date'),
                'slot_id'=>$this->input->post('ids')
            ),
            '/v1/timeslots/'

        );

        echo $response['code'];
    }

}


