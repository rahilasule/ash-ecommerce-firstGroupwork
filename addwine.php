
<?php
	session_start();
	if(!isset($_SESSION['uname']) && $_SESSION['uname']==""){
		header("location:login.php");
	}
	
?>
		<?php
		if(isset($_REQUEST['wn'])){
			include_once("wines.php");
			$obj = new wines();
			$wn = $_REQUEST['wn'];
			$wt=$_REQUEST['type_id'];
			$yr = $_REQUEST['yr'];
			$wid = $_REQUEST['winery_id'];
			$des = $_REQUEST['wd'];
			$pic = $_REQUEST['fileToUpload'];
			$obj->add_wine($wn, $wt, $yr, $wid, $des, $pic);
			
			header("location:viewAfterLogIn.php");
			}
		?>

<html>
	<head>
		<title>Add Wine</title>
	</head>
	<body>
		<h><b>ADD WINE</b></h> <br>
		<form method="post" action="addwine.php">
			<div>Wine Name: <input type="text" name="wn" required></div><br>
			<div>Wine Type: <select name="type_id">
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
			<div>Year: <input type="text" name="yr" size="30" required></div><br>
			<div>Winery: <select name="winery_id">
							<option value="0">--Select Winery--</option>
							<?php
							include_once("wines.php");
							$obj2 = new wines();
							
							$obj2->get_winery();
							while($row=$obj2->fetch()){
								echo "<option value='{$row['winery_id']}''>{$row['winery_name']}</option>";
							}
							?>
						</select>
				</div><br>
			<div>Description: <textarea name="wd" cols="30" rows="5"></textarea></div><br>
			
			<input type="submit" name="do" value="ADD">
		</form>
		<form action="upload.php" method="post" enctype="multipart/form-data">
			Select image to upload: 
			<input type="file" name="fileToUpload" id="fileToUpload">
			<input type="submit" value="Upload Image" name="submit">
		</form>


	</body>
</html>