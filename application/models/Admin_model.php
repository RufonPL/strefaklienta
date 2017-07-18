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

	public function check_pageSlug($projectID, $pageSlug){
		$this->db->select('page_slug');
		$this->db->from('page');
		$this->db->where('project_id', $projectID);
		$query = $this->db->get();
		$query = $query->result_array();
		$key = array_search($pageSlug, array_column($query, 'page_slug'));
		if ($key !== false) {
			return false;
		} else {
			return true;
		}
	}

	public function add_projectPage($projectID, $pageTitle, $pageSlug){
			$data = array(
        'project_id' => $projectID,
        'page_title' => $pageTitle,
				'layout_id' => 0,
        'page_slug' => $pageSlug
			);
			$this->db->insert('page', $data);

			$this->db->select('id');
			$this->db->from('page');
			$this->db->where('page_slug', $pageSlug);
			$query = $this->db->get();
			$pageId = $query->row();
			$pageId = $pageId->id;
			return true;
	}

	public function pageActiveChanger($pageID){
		$this->db->select('is_active');
		$this->db->from('page');
		$this->db->where('id', $pageID);
		$query = $this->db->get();
		$query = $query->row();
		$new = $query->is_active;

		($new == 0) ? $new = 1 : $new = 0;

		$this->db->set('is_active', $new);
		$this->db->where('id', $pageID);
		$this->db->update('page');
		return true;
	}

	public function getProjectName($projectID){
		$this->db->select('project_title');
		$this->db->from('project');
		$this->db->where('id', $projectID);
		$query = $this->db->get();
		$query = $query->row();
		return $query->project_title;
	}

	public function getProjectSlug($projectID){
		$this->db->select('project_slug');
		$this->db->from('project');
		$this->db->where('id', $projectID);
		$query = $this->db->get();
		$query = $query->row();
		return $query->project_slug;
	}

	public function addPageLayout($page_id, $layout_title, $layout_slug){
		$data = array(
			'page_id' => $page_id,
			'layout_title' => $layout_title,
			'layout_slug' => $layout_slug
		);
		$this->db->insert('layouts', $data);
	}
}
