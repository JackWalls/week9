<?php
	session_start();
?>
<DOCTYPE! html>
<html>
	<head>
		<title>Client Form</title>
	</head>
	<body>
		<form action='<?php echo $_SERVER['PHP_SELF']; ?>' method='post'>
			First name	<input name="firstname" type="text">
			Last name 	<input name="lastname" type="text">
			Telephone# 	<input name="telephone" type="text">
			Email 		<input name="email" type="text">
			Street 		<input name="street" type="text">
			City		<input name ="city" type="text">
			State 		<input name ="state" type="text">
			Postal Code <input name ="postal" type="text">
						<br>
			<table>
				<tr>
					<th>Scheduler</th>
				</tr>
			<?php
				$id = $_POST['contractor'];
				$count = 9;
				$half = false;
				for ($i = 0; $i <= 16; $i++) {
					$open = true;
					foreach ($_SESSION['db']->query('SELECT time FROM occupy.time where contractor_id="$id"') as $row) {
						if ($count == $row['time']) {
							$open = false;
						}
					}
					if ($count > 12) {
						$time = $count - 12;
					}
					else {
						$time = $count;
					}
					if ($open == false) {
						if ($half == true) {
							$half = false;
							echo "<tr><td id = 'closed'>" . $time . ":30</td></tr>";
						}
						else {
							$half = true;
							echo "<tr><td id = 'closed'>" . $time . ":00</td></tr>";
						}
					}
					else {
						if ($half == true) {
							$half = false;
							echo "<tr><td id = 'closed'><input type='radio' name='time' value='".$time."'>" . $time . ":30</td></tr>";
						}
						else {
							$half = true;
							echo "<tr><td id = 'closed'><input type='radio' name='time' value='".$time."'>" . $time . ":00</td></tr>";
						}
					}
					$count = $count + 1;
				}
			?>
			</table>
			<input type="submit">
		</form>
	</body>
</html>
					
				
			
		