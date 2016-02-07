<?php
	session_start();
	if(!isset($_SESSION['uname']) && $_SESSION['uname']==""){
		header("location:login.php");
	}
?>
<html>
	<head>
		<title>Edit Wine</title>
		<script>
			
		</script>
	</head>
	<body>
		<?php
		$row=null;
			if(isset($_REQUEST['wid'])){	
				require_once("wines.php");
				$obj = new wines();
				$wid=$_REQUEST['wid'];		
				$obj->get_wine($wid);
				$row=$obj->fetch();
				}
			?>
		
		<?php
		if(isset($_REQUEST['wn'])){
			include_once("wines.php");
			$obj1 = new wines();
			$wid= $_REQUEST['wid'];
			$wn = $_REQUEST['wn'];
			$wt=$_REQUEST['type_id'];
			$yr = $_REQUEST['yr'];
			$wid = $_REQUEST['winery_id'];
			$des = $_REQUEST['wd'];
			
			$obj1->edit_wine($wid, $wn, $wt, $yr, $wid, $des);
			
			header("location: viewAfterLogIn.php");
		}
		?>
		<form method="GET" action="editwine.php">
			<input type="hidden" name="wid" value="<?php echo $wid; ?>">
			<div>Wine Name: <input type="text" value="<?php echo $row['wine_name']; ?>" name="wn" id="wn"></div><br>
			<div>Wine Type: <select name="type_id" id="type_id">
						<option value="0">--Select Wine Type--</option>
						<?php
							include_once("wines.php");
							$obj=new wines();
							$obj->get_wine_type();
							while($obj1=$obj->fetch()){
								
								if($obj1['wine_type_id']==$row['wine_type']){
									echo "<option value='{$obj1['wine_type_id']}' selected>{$obj1['wine_type']}</option>";
								}else{
									echo "<option value='{$obj1['wine_type_id']}'>{$obj1['wine_type']}</option>";
								}
								
							}
						?>
			</select></div><br>
			<div>Year: <input type="text" value="<?php echo $row['year']; ?>" name="yr" id="yr"></div><br>
			<div>Winery: <select name="winery_id" id="winery_id">
						<option value="0">--Select Winery--</option>
						<?php
							include_once("wines.php");
							$obj=new wines();
							$obj->get_winery();
							while($obj1=$obj->fetch()){
								
								if($obj1['winery_id']==$row['winery_id']){
									echo "<option value='{$obj1['winery_id']}' selected>{$obj1['winery_name']}</option>";
								}else{
									echo "<option value='{$obj1['winery_id']}'>{$obj1['winery_name']}</option>";
								}
								
							}
						?>
						</select></div><br>
			<div>Description: <textarea name="wd" id="wd" cols="30" rows="5" value="<?php echo $row['description']; ?>"></textarea></div>
			<input type="submit" value="UPDATE">
		</form>
	</body>
</html>