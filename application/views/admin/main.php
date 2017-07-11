<?php
	echo "Jesteś na Admin Dashboard - o ja, nie wylogowało, ale póki co chuja możesz zrobić.<br/>";
	echo '<a href="'.base_url("logout").'">Logout</a><br/><br/>';

?>

Dostępne projekty:<br/>
<table border="1" cellpadding="10">
<?php
	foreach ($projects as $item) {
		$id = $item['id'];
		echo "<tr>";
		echo "<td>".$item['id']."</td>";
		echo "<td>".$item['project_title']."</td>";
		echo "<td>".$item['project_description']."</td>";
		echo "<td>".$item['project_slug']."</td>";
		
		echo '<td><a href="'.base_url("admin/changeProjectID/$id").'">Przejdź do projektu</a></td>';
		echo "</tr>";
	}
