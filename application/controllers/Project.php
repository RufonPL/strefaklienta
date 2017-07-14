<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Project extends CI_Controller {

        public function __construct()
        {
                parent::__construct();
				session_start();
                $this->load->helper('url_helper');
				if (!isset($_SESSION["user"])){
					echo "Nie jesteś zalogowany. <br><a href=".base_url("login").">Zaloguj się.</a>";
					exit;
				}
				$this->load->model('project_model');

        }

        public function view($slug = false)
        {
			if ($slug == false){
				$data['dbquerylayout'] = $this->project_model->get_projectFirstLayout();
			} else {
				$data['dbquerylayout'] = $this->project_model->get_projectLayout($slug);
			}

			$data['dbquery'] = $this->project_model->get_menuItems($_SESSION["project_id"]);

			$this->load->helper('html');

      $this->load->library('functions', $data['dbquerylayout']);
	    $this->load->view('projekty/header', $data);

			// debug informations - show only with admin status
			$_SESSION['user_type'] == "admin" ? $this->load->view('projekty/main', $data) : '';

			$this->load->view('projekty/menubutton', $data);
	    $this->load->view('projekty/footer', $data);
      }



}
