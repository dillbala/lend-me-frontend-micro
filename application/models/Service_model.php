<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');


class Service_model extends CI_Model
{


    public $apiServer = 'http://54.254.209.255/mentor';
//    public $apiServer = 'http://127.0.0.1:5000';

    function __construct() {
        parent::__construct();

    }



    public function getFile($url)
    {
        $ch = curl_init();

// set URL and other appropriate options
        curl_setopt($ch, CURLOPT_URL, $this->apiServer.$url);
        curl_setopt($ch, CURLOPT_HEADER, 0);

// grab URL and pass it to the browser
        curl_exec($ch);

// close cURL resource, and free up system resources
        curl_close($ch);
    }
    public function fileData($url,$data)
    {
//        $post = array('type' => $data['type'],'user_id'=>$data['user_id'],'file'=>'@'.$data['path']);
        $post = array('type' => $data['type'],'user_id'=>$data['user_id'],'file'=>new CurlFile($data['path']));


        $ch = curl_init();
        $headers = array();
        if (!empty($this->session->userdata['token']))
        {
            array_push($headers,'token: '.$this->session->userdata['token']);
        }


        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers
        );
        curl_setopt($ch, CURLOPT_URL,$this->apiServer.$url);
        curl_setopt($ch, CURLOPT_POST,1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $post);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER,1);
        $result=curl_exec ($ch);
        $httpcode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
        // Free up the resources $curl is using
        curl_close($ch);

        $data['result'] = json_decode($result,true);
        $data['code'] = $httpcode;

        return $data;
    }
    public function deleteData($url)
    {
        $curl = curl_init($this->apiServer.$url);

        curl_setopt($curl, CURLOPT_CUSTOMREQUEST, "DELETE");

        $headers = array('Content-Type: application/json');
        if (!empty($this->session->userdata['token']))
        {
            array_push($headers,'token: '.$this->session->userdata['token']);
        }


        curl_setopt($curl, CURLOPT_HTTPHEADER, $headers
        );

        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);  // Make it so the data coming back is put into a string
        curl_setopt($curl, CURLOPT_VERBOSE, true);


        // Send the request
        $result = curl_exec($curl);
        $httpcode = curl_getinfo($curl, CURLINFO_HTTP_CODE);
        // Free up the resources $curl is using
        curl_close($curl);

        $data['result'] = json_decode($result,true);
        $data['code'] = $httpcode;

        return $data;
    }
    public function getData($url)
    {

        $curl = curl_init($this->apiServer.$url);

        curl_setopt($curl, CURLOPT_CUSTOMREQUEST, "GET");

        $headers = array('Content-Type: application/json');
        if (!empty($this->session->userdata['token']))
        {
            array_push($headers,'token: '.$this->session->userdata['token']);
        }


        curl_setopt($curl, CURLOPT_HTTPHEADER, $headers
        );

        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);  // Make it so the data coming back is put into a string
        curl_setopt($curl, CURLOPT_VERBOSE, true);


        // Send the request
        $result = curl_exec($curl);
        $httpcode = curl_getinfo($curl, CURLINFO_HTTP_CODE);
        // Free up the resources $curl is using
        curl_close($curl);

        $data['result'] = json_decode($result,true);
        $data['code'] = $httpcode;

        return $data;
    }

    public function putData($data,$url)
    {
        $data_string = json_encode($data);

        $curl = curl_init($this->apiServer.$url);

        curl_setopt($curl, CURLOPT_CUSTOMREQUEST, "PUT");

        $headers = array('Content-Type: application/json');
        if (!empty($this->session->userdata['token']))
        {
            array_push($headers,'token: '.$this->session->userdata['token']);
        }


        curl_setopt($curl, CURLOPT_HTTPHEADER, $headers
        );

        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);  // Make it so the data coming back is put into a string
        curl_setopt($curl, CURLOPT_POSTFIELDS, $data_string);  // Insert the data
        curl_setopt($curl, CURLOPT_VERBOSE, true);


        // Send the request
        $result = curl_exec($curl);
        $httpcode = curl_getinfo($curl, CURLINFO_HTTP_CODE);
        // Free up the resources $curl is using
        curl_close($curl);

        $data['result'] = json_decode($result,true);
        $data['code'] = $httpcode;

        return $data;
    }
    public function postData($data,$url)
    {

        $data_string = json_encode($data);

        $curl = curl_init($this->apiServer.$url);

        curl_setopt($curl, CURLOPT_CUSTOMREQUEST, "POST");

        $headers = array('Content-Type: application/json');
        if (!empty($this->session->userdata['token']))
        {
            array_push($headers,'token: '.$this->session->userdata['token']);
        }


        curl_setopt($curl, CURLOPT_HTTPHEADER, $headers
        );

        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);  // Make it so the data coming back is put into a string
        curl_setopt($curl, CURLOPT_POSTFIELDS, $data_string);  // Insert the data
        curl_setopt($curl, CURLOPT_VERBOSE, true);


        // Send the request
        $result = curl_exec($curl);
        $httpcode = curl_getinfo($curl, CURLINFO_HTTP_CODE);
        // Free up the resources $curl is using
        curl_close($curl);

        $data['result'] = json_decode($result,true);
        $data['code'] = $httpcode;

        return $data;

    }


}