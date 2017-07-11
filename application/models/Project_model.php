<?php
class Project_model extends CI_Model {

        public function __construct()
        {
                $this->load->database();
        }
		
		
		
		public function get_projectSlug($projectId) // nie tetowany
		{
			$this->db->select('project_slug');
			$this->db->from('project');
			$this->db->where('id', $projectID);
			$query = $this->db->get();			
			
//			$query = $this->db->query("SELECT project_slug FROM project WHERE id = $projectID");
			return $query->result_array();
		}
		
		
		
		public function get_projectSlugFirst($projectId) // nie tetowany
		{
			$this->db->select('project_slug');
			$this->db->from('project');
			$this->db->where('id', $projectID);
			return $query->result_array();
		}		
		
		
		
		public function get_projectLayout($pageSlug)
		{
			$projectID = $_SESSION["project_id"];
//			$pageId = 4;
//			$projectID = 2;
//			$pageSlug = "strona-glowna";
			$query = $this->db->query("	SELECT layouts.layout_slug, project.project_slug
										FROM page, layouts, project
										WHERE page.page_slug = '$pageSlug' AND page.id = layouts.page_id AND project.id = $projectID ;");
			
			return $query->result_array();
		}


		public function get_projectFirstLayout()
		{
			$projectID = $_SESSION["project_id"];
			$query = $this->db->query("	SELECT layouts.layout_slug, project.project_slug
										FROM page, layouts, project
										WHERE page.id = layouts.page_id AND project.id = $projectID AND page.project_id = $projectID
										LIMIT 1");
			
			return $query->result_array();
		}



		public function get_menuItems($projectID)
		{
			if (!isset($projectID)){
				$projectID = 1;
				echo '$projectID nie jest set!';
			}
			$query = $this->db->query("SELECT project.id, page.project_id, page.page_title, page.page_slug FROM project, page WHERE project.id = page.project_id AND project.id = $projectID");
			return $query->result_array();
		}
}