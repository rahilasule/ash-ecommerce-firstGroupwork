<?php
/*
	session_start();
	if(!isset($_SESSION['uname'] && $_SESSION['pwd'])){
		header("location:login.php");
	}
	**/
?>
<html>
	<head>
		<title>Edit Wine</title>
		<link rel="stylesheet" href="css/style.css">
		<script>
			
		</script>
	</head>
	<body>
		<?php
			if(!isset($_REQUEST['wid'])){
				exit();
			}		
				include("wines.php");
				$obj = new wines();
				$wid=$_REQUEST['wid'];		
				if(!$obj->get_wine($wid)) {
					echo "Error Editing Wine";
					exit();
				}else{
					$row=$obj->fetch();
				}
			?>
	
		<table>
			<tr>
			<td>Wine Name: </td><td> <input type="text" value="<?php echo $row['wine_name']?>" id="wn"></td>
			</tr>
			<tr>
			<td>Wine Type: </td><td><select id="lid">
						<option value="0">--Select Wine Type--</option>
						<?php
							include_once("wines.php");
							$obj=new wines();
							$obj->get_wine_type();
							while($obj1=$obj->fetch()){
								
								if($obj1['wine_type_id']==$row['wine_type']){
									echo "<option value='{$obj1['wine_type_id']}' selected>{$obj1['wine_type']}</option>";
								}else{
									echo "<option value='{$obj1['wine_type_id']}'>{$ibj1['wine_type']}</option>";
								}
								
							}
						?>
						</td>
			</tr>
			
			<tr>
			<td>Year: </td><td> <input type="text" value="<?php echo $row['year']?>" id="yr"></td>
			</tr>
			<tr>
			<td>Winery:</td><td><select id="lid">
						<option value="0">--Select Winery--</option>
						<?php
							include_once("wines.php");
							$obj=new wines();
							$obj->get_winery();
							while($obj1=$obj->fetch()){
								
								if($obj1['winery_id']==$row['winery_id']){
									echo "<option value='{$obj1['winery_id']}' selected>{$obj1['winery_name']}</option>";
								}else{
									echo "<option value='{$obj1['winery_id']}'>{$ibj1['winery_name']}</option>";
								}
								
							}
						?>
						</td>
			</tr>
			<tr>
			<td>Description: </td><td><textarea id="wd" cols="30" rows="5"><?php echo $row['description']?></textarea></td>
			</tr>
			<tr><td></td><td>
			<input type="submit" onclick="editEquipment()" value="Edit"></td>
			</tr>
		</table>
			
	</body>
</html>