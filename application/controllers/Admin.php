<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		session_start();
		$this->load->helper('url_helper');
		if ($_SESSION["user_type"] != "admin"){
			echo "Nie masz uprawnień, aby to przeglądać. <br><a href=".base_url("login").">Zaloguj się.</a>";
			exit;
		}
		$this->load->model('admin_model');

	}

	public function main()
	{
		$data['projects'] = $this->admin_model->get_AllProjects();
		$this->load->view('admin/main', $data);
	}

	public function changeProjectID($projectID){
		$query = $this->admin_model->change_projectID($projectID);
		$_SESSION["project_id"] = $query->id;
		return redirect('/project/view/');
	}

	public function pageCreate($projectID = 1, $pagetitle = "(D)Strona główna", $pageSlug = "strona-glowna"){
		$data['query'] = $this->admin_model->add_projectPage($projectID, $pagetitle, $pageSlug);
		$this->load->view('admin/pagemodification', $data['query']);


	}
}
