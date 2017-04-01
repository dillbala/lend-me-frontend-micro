<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');


class Instructor_model extends CI_Model
{


    function __construct() {
        parent::__construct();

    }


    public function get_instructor_with_email($email)
    {

        $query = $this->db->get_where('users', array('email' => $email));
        return $query->result_array();
    }
    public function get_instructors($id=FALSE){

        if($id===FALSE)
        {
            $this->db->where('status', 1);
            $this->db->order_by('id', 'DESC');
            $query = $this->db->get('users');
            return $query->result_array();
        }
        $query = $this->db->get_where('users', array('id' => $id));
        return $query->row_array();

    }
    public function add_instructor(){

        $data = array(
            'name' => $this->input->post('name'),
            'email' => $this->input->post('email'),
            'role' => 2,
            'status' => 1,
            'password'=>$this->input->post('password')
        );
        return $this->db->insert('users', $data);
    }
    public function delete_instructor($id){
        $this->db->where('id', $id);
        $this->db->update('users',array('status'=>0));
        return true;
    }
    public function update_instructor(){
        $data = array(
            'name' => $this->input->post('name'),
            'password' => $this->input->post('password'),
            'email' => $this->input->post('email')
        );

        $this->db->where('id', $this->input->post('id'));
        return $this->db->update('users', $data);
    }


    public function addSlots()
    {


    }


}

