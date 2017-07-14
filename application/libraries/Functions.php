<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Functions {

	function getLayout($dbquery, $type)
	{
		foreach ($dbquery as $row)
		{
			$project = 	$row['project_slug'];
			$image = 	$row['layout_slug'];
		}
		$url = base_url("uploads/projects")."/".$project."/".$image;
		$size = getimagesize($url);
		switch ($type) {
			case "url":
				return $url;
				break;
			case "width":
				return $size[0];
				break;
			case "height":
				return $size[1];
				break;
			default:
				echo "Unkown param in getLayout function";
		}
	}


}
