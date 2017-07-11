<?php
class Login_model extends CI_Model {

	public function __construct()
	{
		$this->load->database();
	}

	public function get_user($username)
	{
		$this->db->select('name, username, password, users_type, project_id');
		$this->db->from('users');
		$this->db->where('username', $username);
		$query = $this->db->get();

		return $query->result_array();
	}

	public function get_users()
	{
		$query = $this->db->get('users');
		return $query->result_array();
	}
	
	
	/* PANIE ALEŚ PAN ODJEBAŁ..... */
	public function check_user($username, $password){
		$this->db->select('id, name, username, password, users_type, project_id');
		$this->db->from('users');
		$this->db->where('username', $username);
		$query = $this->db->get();
		$row = $query->row();
		
		if ($username == $row->username && $password == $row->password){
			session_start();	
			$_SESSION["project_id"] = $row->project_id;
			$_SESSION["user"]		= $row->id;
			$_SESSION["user_type"]	= $row->users_type;
			if ($row->users_type == "admin"){
				return redirect('/admin/main/', $var);
			}
			return redirect('/project/view/', $var);
		} else {
			$var = "niezalogowany";
		}
		echo $var;
		
		return $var;
	}
}