<?php
class Admin_model extends CI_Model {

	public function __construct()
	{
		$this->load->database();
	}
	
	public function get_AllProjects(){
		$this->db->select('id, project_title, project_description, project_slug');
		$this->db->from('project');
		$query = $this->db->get();
		
		return $query->result_array();
	}
	
	public function change_projectID($projectID){
		$this->db->select('id');
		$this->db->from('project');
		$this->db->where('id', $projectID);
		$query = $this->db->get();
		return $query->row();
/*		if (!empty($query)){
			echo "not empty";
		} else {
			echo "yep, empty";
		}
	*/	
//		return $query->result_array();
	}
}