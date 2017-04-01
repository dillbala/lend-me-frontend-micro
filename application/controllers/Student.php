
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
        return false;
    }
    public function classes()
    {
        $user_id = $this->session->userdata['userId'];
        $instructor_data = $this->get_my_instructor($user_id);
        $data['instructor'] = $instructor_data;
        $date = date('Y-m-d');
        $lastDate = date('Y-m-d',strtotime("+7 day"));
        $query = '';
        $query.='status_instructor=2'.'&start_date='.$date.'&end_date='.$lastDate.'&instructor_id='.$instructor_data['id'];

        $classes= $this->service_model->getData('/v1/timeslots/?'.$query)['result']['data'];
        $groupedClasses= array();
        foreach ($classes as $class )
        {
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
        $this->load->view('/students/classes',$data);
        $this->load->view('/template/footer');

    }
    public function addClass()
    {
        $user_id = $this->session->userdata['userId'];
        $response = $this->service_model->postData(
            array(
                'student_id' => $user_id,
                'ids'=>$this->input->post('ids'),
                'classAdd'=>1
            ),
            '/v1/timeslots/'

        );

        print_r($response['code']);
//        echo $response['code'];
    }
    public function get_my_instructor($userId)
        {
            $response = $this->service_model->getData('/v1/requests/?status=2&userId='.$userId);
            if (!empty($response['result']['data']))

            {
                $instructorId = $response['result']['data'][0]['instructorId'];
                return $this->service_model->getData('/v1/instructors/'.$instructorId)['result']['data'][0];
            }
            return False;

        }

    public function bookClass()
    {
        $user_id = $this->session->userdata['userId'];
        $instructor_data = $this->get_my_instructor($user_id);
        $data['instructor'] = $instructor_data;
        $date = date('Y-m-d');
        $lastDate = date('Y-m-d',strtotime("+7 day"));
        $query = '';
        $query.='status_instructor=1'.'&start_date='.$date.'&end_date='.$lastDate.'&instructor_id='.$instructor_data['id'];

        $classes= $this->service_model->getData('/v1/timeslots/?'.$query)['result']['data'];
        $groupedClasses= array();
        foreach ($classes as $class )
        {
            if (!array_key_exists($class['date'],$groupedClasses))
            {
                $groupedClasses[$class['date']] = array();
            }
            array_push($groupedClasses[$class['date']],$class);
        }
        $data['classes'] = $groupedClasses;
        $this->load->view('/template/header');
        $this->load->view('/students/bookClass',$data);
        $this->load->view('/template/footer');
    }

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
