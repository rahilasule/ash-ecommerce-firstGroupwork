<html>
	<head>
		<title>Sorting</title>
	</head>
	<body>
		<form action="sortWines.php">
			Sort by : 
			<input type="radio" name="field" value="wine_name"> Wine Name
			<input type="radio" name="field" value="price"> Price
			<input type="submit" value="SORT">
		</form>
	</body>
<?php
	If(isset($_REQUEST['field'])){
		include_once ("adb.php");
		include("wines.php");
		if($_REQUEST['field']=="wine_name"){
			$field= $_REQUEST['field'];
		}

		elseif($_REQUEST['field']=="price"){
			$field= $_REQUEST['field'];
		}
		
		$obj = new wines();
		$obj->sortBy($field);
		echo "<table border='1'>";
		echo "<tr style='background-color:purple; color:white;text-align:center'>
			<td>Wine ID</td><td>Wine Name</td><td>Price</td></tr>";

		while($row=$obj->fetch()){

			echo "<tr><td>{$row['wine_id']}</td><td>{$row['wine_name']}</td><td>{$row['price']}</td></tr>";
		}
		echo "</table>";
	}
?>
</html>