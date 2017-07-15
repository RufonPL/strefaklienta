<div class="menu-dropdown"><!-- TOP-LEFT DROPDOWN MENU-->
  <div class="dropdown">
    <button class="btn btn-default dropdown-toggle" type="button" data-toggle="dropdown"><i class="fa fa-cog"></i> Settings</button>
    <ul class="dropdown-menu">
    <?php
		foreach ($dbquery as $row) {
			echo '<li><a href="'.$row['page_slug'].'">'.$row['page_title'].'</a>
              <button href="#" class="btn btn-delete pull-right"><i class="fa fa-trash-o"></i></button>
              <button href="#" class="btn btn-edit pull-right"><i class="fa fa-pencil"></i></button></li>'."\n";
		}

		if ($_SESSION['user_type'] == "admin") { ?>
			<li class="divider"></li>
      <li><a href="<?php echo base_url("admin/pageadd");?>">Dodaj stronę</a></li>
   	  <li><a href="<?php echo base_url("admin");?>">Przejdź do AdminDashboard</a></li> <?php
		}
    ?>

	   <li class="divider"></li>
	   <li><a href="<?php echo base_url("logout");?>">Logout</a></li>
    </ul>
  </div><!-- TOP-LEFT DROPDOWN MENU-->
</div>
