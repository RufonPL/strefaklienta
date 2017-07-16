<div class="menu-dropdown"><!-- TOP-LEFT DROPDOWN MENU-->
  <div class="dropdown">
    <div class="btn-group">
              <a class="btn btn-primary" href="#"><i class="fa fa-user fa-fw"></i><?php echo $_SESSION["username"];?></a>
              <a class="btn btn-primary dropdown-toggle" data-toggle="dropdown" href="#" aria-expanded="false">
                <span class="fa fa-caret-down" title="Toggle dropdown menu"></span>
              </a>
    <!--<button class="btn btn-default dropdown-toggle" type="button" data-toggle="dropdown"><i class="fa fa-cog"></i> Settings</button>-->
    <ul class="dropdown-menu">
    <?php
		foreach ($dbquery as $row) {
      if ($row['is_active'] == 1 || $_SESSION['user_type'] == "admin"){
  			if ($row['is_active'] == 1) {
          echo '<li>';
        } else {
          echo '<li class="page-inactive">';
        }
        echo '<a href="'.$row['page_slug'].'">'.$row['page_title'].'</a>';
        if ($_SESSION['user_type'] == "admin") {
                ?> <div class="pull-right">
                  <?php if ($row['layout_id'] == 0) { ?>
                  <button href="#" class="btn btn-success" title="no image found - uload your layout here"><i class="fa fa-file-image-o"></i></button>
                  <?php }
                  if ($row['is_active'] == 1) {
                    echo '<button href="#" class="btn btn-setactive" title="set page as inactive"><i class="fa fa-dot-circle-o"></i></button>';
                  } else {
                    echo '<button href="#" class="btn btn-setactive" title="set page as active"><i class="fa fa-circle-o"></i></button>';
                  } ?>
                  <button href="#" class="btn btn-edit" title="edit"><i class="fa fa-pencil"></i></button>
                  <button href="#" class="btn btn-delete" title="delete"><i class="fa fa-trash-o"></i></button>
                </div>
              </li>
              <?php
        }
      }
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
