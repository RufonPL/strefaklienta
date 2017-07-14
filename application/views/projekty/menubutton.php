<div class="container" style="position: fixed; top: 10px; left: 10px; z-index: 9999; padding: 0;"><!-- TOP-LEFT DROPDOWN MENU-->
  <div class="dropdown" style="float: left;">
    <button class="btn btn-success dropdown-toggle" type="button" data-toggle="dropdown"><span class="glyphicon glyphicon-menu-hamburger" aria-hidden="true"></span></button>
    <ul class="dropdown-menu">
    <?php
		foreach ($dbquery as $row) {
			echo '<li><a href="'.$row['page_slug'].'">'.$row['page_title']."</a></li>\n";
		}

		if ($_SESSION['user_type'] == "admin") {
			echo '<li class="divider"></li>';
		}
    ?>
     <li><a href="<?php echo base_url("admin/pageadd");?>">Dodaj stronę</a></li>
  	 <li><a href="<?php echo base_url("admin");?>">Przejdź do AdminDashboard</a></li>
	   <li class="divider"></li>
	   <li><a href="<?php echo base_url("logout");?>">Logout</a></li>
    </ul>
  </div><!-- TOP-LEFT DROPDOWN MENU-->
</div>
