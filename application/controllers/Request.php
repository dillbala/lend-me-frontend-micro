
<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Request extends MY_Controller {

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


    public function instructor()
    {
        $instructorId = $this->session->userdata['userId'];
        $response= $this->service_model->getData('/v1/requests/?instructorId='.$instructorId);
        $data['requests'] = array();
        if ($response['code']==200)
        {
            $data['requests'] = $response['result']['data'];

        }
        else{
            $data['error'] = $response['result']['message'];
        }
        $this->load->view('/template/header');
        $this->load->view('/instructor/requests',$data);
        $this->load->view('/template/footer');


    }

    public function accept($request_id)
    {

        $response = $this->service_model->postData(
            array(
                'accept' => 1
            ),
            '/v1/requests/'.$request_id

        );

        redirect('request/instructor');


    }
    public function decline($request_id)
    {

        $response = $this->service_model->postData(
            array(
                'decline' => 1
            ),
            '/v1/requests/'.$request_id

        );

        redirect('request/instructor');

    }
    public function view($location)
    {
        print_r($this->service_model->getFile('/v1/static/'.$location));
    }


}
