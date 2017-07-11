<div style="width: 100%; text-align: center; background: black; color: white;">
	HELLO WORLD!<br>
<?php
	echo 'Zalogowany user to - ['.$_SESSION["user"].'] / Project id to - ['.$_SESSION["project_id"].'] / user type = ['.$_SESSION["user_type"].']<br>';
	
?>
<br>
	<?php echo base_url().'||assets/css/style.css'; ?>
	<?php
		foreach ($dbquery as $row) {
			echo $row['page_title'];
			echo $row['page_slug'];
			echo "<br>";
		}	
		echo 'print_r($dbquery);'."<br>";
		print_r($dbquery);
	?>
	<hr>
	<?php
		echo "dbquerylayout:<br>";
		
		foreach ($dbquerylayout as $row) {
			echo "project_slug = ".$row['project_slug']."<br>";
			echo "layout_slug = ".$row['layout_slug']."<br>";
			echo "<br>";
		}
		echo 'print_r($dbquerylayout);'."<br>";
		print_r($dbquerylayout);
		echo "<br>";
	?>
	
	<?php //echo Project::getLayout($data['dbquerylayout']);?>
	<?php echo getLayout($dbquerylayout);?>
	<?php //echo getLayout($data['dbquerylayout']);?>	
	<?php //echo $this->controllers->projects->getLayout(/*$data['dbquerylayout']*/);?>
	
</div>	