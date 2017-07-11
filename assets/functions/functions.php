<?php
	function getLayout($dbquery)
	{
//		echo "Hello World!<br>";
//		print_r($dbquery);
		foreach ($dbquery as $row)
		{
//			$project = "0";
//			$image = "0";
			$project = 	$row['project_slug'];
			$image = 	$row['layout_slug'];
			
/*			echo "<br>getLayout project = $project";
			echo "<br>getLayout image   = $image";
			echo "<br>";*/
		}	
		return base_url("uploads/projects")."/".$project."/".$image;
	}
	
	function test ()
	{
		echo "do nothing.";
	}
