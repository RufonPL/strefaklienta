Form Success


<?php

      $this->load->model('login_model');
			$this->load->login_model->check_user($_POST['username'], $_POST['password']);
