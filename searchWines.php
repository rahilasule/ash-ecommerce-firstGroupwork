<html>
	<head>
		<title>Search</title>
	</head>

	<body>
		<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>

		<form action="searchWines.php" method="GET">
		Enter Wine Name : <input ="text" size="30" name="str">
		<input type="submit" value="Search">
		</form>

	</body>

<?php
	If(isset($_REQUEST['str'])){
		include_once ("adb.php");

		include("wines.php");
		$search_text=$_REQUEST['str'];
		$obj = new wines();

		echo "<table border='1'>";
		echo "<tr style='background-color:purple; color:white;text-align:center'>
			<td>Wine ID</td><td>Wine Name</td><td>Wine Type</td><td>Year</td>
			<td>Winery Name</td></tr>";
		$obj->search_wines($search_text);
		
		while($row=$obj->fetch()){

			echo "<tr><td>{$row['wine_id']}</td><td>{$row['wine_name']}</td><td>{$row['wine_type']}</td><td>{$row['year']}</td><td>{$row['winery_name']}</td></tr>";
		}
		echo "</table>";
	}
?>
</html>