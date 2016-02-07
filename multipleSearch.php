<html>
	<head>
		<title>Multiple Search</title>
	</head>

	<body>
		<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>

		<form action="multipleSearch.php" method="GET">
		<div>Wine Type: <select name="wt" required>
							<option value="0">--Select Wine Type--</option>
							<?php
							include_once("wines.php");
							$obj1 = new wines();
							
							$obj1->get_wine_type();
							while($row=$obj1->fetch()){
								echo "<option value='{$row['wine_type_id']}''>{$row['wine_type']}</option>";
							}
							?>
						</select>
				</div><br>
		<div>Year: <select name="yr" required>
						<option value="0">--Select Year--</option>
							<?php
							include_once("wines.php");
							$obj2 = new wines();
							
							$obj2->get_year();
							while($row=$obj2->fetch()){
								echo "<option value='{$row['year']}''>{$row['year']}</option>";
							}
							?>
						</select>
				</div><br>
		<input type="submit" value="Search">
		</form>

	</body>

<?php
	If(isset($_REQUEST['wt'])){
		include_once ("adb.php");

		include_once("wines.php");
		$wine_type=$_REQUEST['wt'];
		$year=$_REQUEST['yr'];
		$obj = new wines();

		echo "<table border='1'>";
		echo "<tr style='background-color:purple; color:white;text-align:center'>
			<td>Wine ID</td><td>Wine Name</td><td>Wine Type</td><td>Year</td>
			<td>Winery Name</td></tr>";
		$obj->multiple_search($wine_type,$year);
		
		while($row=$obj->fetch()){

			echo "<tr><td>{$row['wine_id']}</td><td>{$row['wine_name']}</td><td>{$row['wine_type']}</td><td>{$row['year']}</td><td>{$row['winery_name']}</td></tr>";
		}
		echo "</table>";
	}
?>
</html>