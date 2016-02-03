<html>
	<head>
		<title>Browse by Wine Type</title>
	</head>

	<body>
		<form action="browseByWineType.php">
		Browse by Category: <br>
			<input type="radio" name="cat" value="Sparkling">Sparkling<br>
			<input type="radio" name="cat" value="Fortified">Fortified<br>
			<input type="radio" name="cat" value="Sweet">Sweet<br>
			<input type="radio" name="cat" value="White">White<br>
			<input type="radio" name="cat" value="Red">Red<br>
		<input type="submit" value="BROWSE">
	</form>
	</body>
	<?php
		If(isset($_REQUEST['cat'])){
		include_once ("adb.php");
		include("wines.php");
		
		if($_REQUEST['cat']=="Sparkling"){
			$cat= $_REQUEST['cat'];
		}

		elseif($_REQUEST['cat']=="Fortified"){
			$cat= $_REQUEST['cat'];
		}

		elseif($_REQUEST['cat']=="Sweet"){
			$cat= $_REQUEST['cat'];
		}

		elseif($_REQUEST['cat']=="White"){
			$cat= $_REQUEST['cat'];
		}

		elseif($_REQUEST['cat']=="Red"){
			$cat= $_REQUEST['cat'];
		}
		
		$obj = new wines();
		$obj->browseBy($cat);
		echo "<table border='1'>";
		echo "<tr style='background-color:purple; color:white;text-align:center'>
			<td>Wine ID</td><td>Wine Name</td><td>Wine Type</td><td>Year</td>
			<td>Winery</td></tr>";

		while($row=$obj->fetch()){

			echo "<tr><td>{$row['wine_id']}</td><td>{$row['wine_name']}</td><td>{$row['wine_type']}</td><td>{$row['year']}</td><td>{$row['winery_name']}</td></tr>";
		}
		echo "</table>";
	}
	?>
</html>