<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

  public function __construct()
  {
    parent::__construct();
    session_start();
    $this->load->helper('url_helper');
    $this->load->model('login_model');
  }

		public function checkLogin($post_user = 0, $post_password = 0)
		{
			if ($post_user == 0){
				echo "chujnia, trzeba wrócić";
			}
			print_r($post_user);
			echo "post_user = $post_user";
			echo "post_password = $post_password";

			if (isset($_SESSION["user"]) == false){
				$usercheck = $this->login_model->get_users();
				if ($usercheck['usersname'] == $post_user && $usercheck['password'] == $post_password){
					$_SESSION["user"] = $user;
					$_SESSION["project_id"] = $project_id;
				}
			}
			if (true)
			{
					// do zrobienia controler i model logowania
/*				$user = 1;
				$project_id = 1;

				$_SESSION["user"] = $user;
				$_SESSION["project_id"] = $project_id;
				$_SESSION["user_type"] = "user"; //kiedyś będzie admin panel dla adminów*/
			}


				echo $_SESSION["user"];
/*				$host  = $_SERVER['HTTP_HOST'];
				$uri   = rtrim(dirname($_SERVER['PHP_SELF']), '/\\');
				$extra = 'project/view/';
//				echo "Location: http://$host$uri/$extra";
				header("Location: http://$host$uri/$extra");
//				header("Location: APPPATH/);
				//header("Location: project/view");*/
        }

		public function loginform()
		{
      if (isset($_SESSION["project_id"])) {
        redirect('/project/view/');
      }

 			//do usunięcia informacje wyciągane z bazy na temat użytkowników
 			$data['allusers'] = $this->login_model->get_users();
			$this->load->helper('form');
		  $this->load->library('form_validation');


		  $this->form_validation->set_rules('username', 'Username', 'trim|required');
		  $this->form_validation->set_rules('password', 'Password', 'trim|required');

			$this->load->view('template/header');
            if ($this->form_validation->run() == FALSE)
            {
	            $this->load->view('login/loginform', $data);

            }
            else
            {
            	$this->load->view('login/formsuccess', $data);
            }
			$this->load->view('template/footer');
		}




		public function logout()
		{
        	// remove all session variables
			session_unset();

			// destroy the session
			session_destroy();
			echo "Zostałeś wylogowany. Papa<br><a href=".base_url("login").">Zaloguj się ponownie</a>";

		}

}
