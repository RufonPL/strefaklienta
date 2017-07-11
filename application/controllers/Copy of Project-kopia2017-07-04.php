<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Project extends CI_Controller {

        public function __construct()
        {
                parent::__construct();
				session_start();
                $this->load->model('project_model');
                $this->load->helper('url_helper');
				
        }

        public function view($page = 'main')
        {
	        if ( ! file_exists(APPPATH.'views/projekty/'.$page.'.php'))
	        {
	                show_404();
	        }
	
			function getLayout($dbquery)
			{
//				echo "Hello World!";
//				print_r($dbquery);
				foreach ($dbquery as $row)
				{
					$project = 	$row['project_slug'];
					$image = 	$row['layout_slug'];
					
/*					echo "<br>getLayout project = $project";
					echo "<br>getLayout image   = $image";
					echo "<br>";*/
				}	
				return base_url("uploads/projects")."/".$project."/".$image;
			}	
			$projectId = $_SESSION["project_id"];
	
	        $data['title'] = ucfirst($page); // Capitalize the first letter
//			$data['project'] = $this->project_model->get_projectLayout();
			$data['dbquery'] = $this->project_model->get_menuItems($projectId);
			$data['dbquerylayout'] = $this->project_model->get_projectLayout("2");
			
	
			$this->load->helper('html');
//			$this->load->helper('autoload');
	
	        $this->load->view('projekty/header', $data);
//			$this->load->view('projekty/'.$project.'/'.$image, $data);
	        $this->load->view('projekty/'.$page, $data);
			$this->load->view('projekty/menubutton', $data);
	        $this->load->view('projekty/footer', $data);        	
        }
		
		

}