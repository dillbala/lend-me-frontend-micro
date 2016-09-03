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


	private function getDataFromApi($url)
    {
        // create curl resource
        $ch = curl_init();

        // set url
        curl_setopt($ch, CURLOPT_URL, $url);

        //return the transfer as a string
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);

        // $output contains the output string
        $output = curl_exec($ch);
        return json_decode($output);
        // close curl resource to free up system resources
        curl_close($ch);
    }
    public function details($id)
    {
        if(isset($id))
        {
            $data=$this->getDataFromApi('http://techjack.in/api/battles/'.$id);
            $this->load->view('detail_view',$data);
        }
        else{
            echo "Id of battle is needed";
        }
    }
	public function index()
	{
        $data=$this->getDataFromApi('http://techjack.in/api/battles/');
        $this->load->view('welcome_view',$data);
	}
}
