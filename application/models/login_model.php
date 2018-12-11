<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Login_Model extends CI_Model {

	public function __construct()

	{

	parent::__construct();

	$this->load->database();

	}
	
	public function insert_entry($tablename,$data)
	{
		$query=   $this->db->insert($tablename, $data);
		    return $query;

	}

	public function check_user($username,$password){

	$this->db->where(array('username'=>$username));

	$this->db->where(array('password'=>$password));

	$query=$this->db->get('users');

	//print_r($query);

	if($query->num_rows()>0){

		return $query->result();

	} else {

		return FALSE;

	}
}

}

?>