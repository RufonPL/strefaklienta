<h2>Witaj w aplikacji "Strefa Klienta".</h2>
<p>Wpisz swój login i hasło:</p>

<?php echo validation_errors(); ?>

<?php echo form_open('login/loginform'); ?>

    <label for="username">Username</label>
    <input type="input" name="username" placeholder="Username"/><br />

    <label for="password">Password</label>
    <input name="password" placeholder="password"></input><br />

    <input class="btn btn-default" type="submit" name="submit" value="Zaloguj się" />

</form>

<h2>Dostępne konta</h2>
<table border="1">
	<tr>
		<td>Name:</td>
		<td>Username:</td>
		<td>Password:</td>
		<td>User Type:</td>
	</tr>
<?php 
	foreach ($allusers as $row)
	{
		echo "<tr>";
		echo "<td>".$row['name']."</td>";
		echo "<td>".$row['username']."</td>";
		echo "<td>".$row['password']."</td>";
		echo "<td>".$row['users_type']."</td>";
	}
 ?>
 </table>