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



	public function changeProjectID($projectID)
	{
		$query = $this->admin_model->change_projectID($projectID);
		$_SESSION["project_id"] = $query->id;
		return redirect('/project/view/');
	}


	public function pageAdd()
	{
		$this->load->helper('form');
		$this->load->library('form_validation');

		$this->form_validation->set_rules('PageTitle', 'PageTitle', 'trim|required');
		$this->form_validation->set_rules('PageSlug', 'PageSlug', 'callback_check_pageSlug');

		if ($this->form_validation->run() == FALSE)
		{
			$this->load->view('admin/pageadd');
		}
		else
		{
			$this->admin_model->add_projectPage($_SESSION["project_id"], $_POST['PageTitle'], $_POST['PageSlug']);
			redirect('/project/view/');
		}

	}

	public function check_pageSlug($slug)
	{
		$checkslug = $this->admin_model->check_pageSlug($_SESSION["project_id"], $slug);
		if ($checkslug === false)
		{
			$this->form_validation->set_message('check_pageSlug', 'Slug "'.$slug.'" already exists - please take another one');
			return FALSE;
		}
		else
		{
			return TRUE;
		}
	}

	/* do zmiany :( */
	public function pageCreate($projectID = false, $pagetitle = false, $pageSlug = false){
		$projectID = 1;
		$pagetitle = "(D)Strona główna";
		$pageSlug = "strona-glowna";

		$data['query'] = $this->admin_model->add_projectPage($projectID, $pagetitle, $pageSlug);
		$this->load->view('admin/pagemodification', $data['query']);


	}
}
