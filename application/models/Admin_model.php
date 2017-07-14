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
	}

	public function add_projectPage($projectID, $pageTitle, $pageSlug){
		echo '$pageSlug = '."$pageSlug\n";
		$this->db->select('project_id, page_slug');
		$this->db->from('page');
		$this->db->where('project_id', $projectID);
		$query = $this->db->get();
		$query = $query->result_array();

		$key = array_search($pageSlug, array_column($query, 'page_slug'));
		if ($key === false) {
			// return error - slug (or title) exists, please pick different
		} else {
			// not tested
/*			$data = array(
        'project_id' => $projectID,
        'page_title' => $pageTitle,
				'layout_id' => NULL,
        'page_slug' => $pageSlug
			);

			$this->db->insert('page', $data);*/
		}
	}
}
