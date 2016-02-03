
<?php
	/*
	session_start();
	if(!isset($_SESSION['uname'])){
		header("location:login.php");
	}
	**/
?>

<html>
	<head>
		<title>Add Wine</title>
	</head>
	<body>
		<h><b>ADD WINE</b></h> <br>
		<table>
			<tr>
				<td>Wine Name: </td><td><input type="text" id="wn" required></td>
			</tr>
			<tr>
				<td>Wine Type: </td><td><select id="type_id">
							<option value="0">--Select Wine Type--</option>
							<?php
							include_once("wines.php");
							$obj = new wines();
							
							$obj->get_wine_type();
							while($row=$obj->fetch()){
								echo "<option value='{$row['wine_type_id']}''>{$row['wine_type']}</option>";
							}
							?>
						</select>
				</td>
			</tr>
			<tr>
				<td>Year: </td><td><input type="text" id="yr" size="30" required></td>
			</tr>
				<td>Winery:</td><td><select id="winery_id">
							<option value="0">--Select Winery--</option>
							<?php
							include_once("wines.php");
							$obj = new wines();
							
							$obj->get_winery();
							while($row=$obj->fetch()){
								echo "<option value='{$row['winery_id']}''>{$row['winery_name']}</option>";
							}
							?>
						</select>
				</td>
			<tr>
				<td>Description:</td> <td><textarea id="ed" cols="30" rows="5"required></textarea></td>
			</tr>
			<tr><td></td><td>
			<input type="submit" onclick="addWine()" value="ADD"></td>
			</tr>
		</table>
	</body>
</html>