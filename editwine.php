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
			if(isset($_REQUEST['wid'])){	
				require_once("wines.php");
				$obj = new wines();
				$wid=$_REQUEST['wid'];		
				$obj->get_wine($wid)
				$row=$obj->fetch();


				}
			}
			?>
	
		<form method="GET" action="editwine.php">
			<input type="hidden" name="id" value="<?php echo $wid; ?>">
			<div>Wine Name: <input type="text" value="<?php echo $row['wine_name']?>" id="wn"></div><br>
			<div>Wine Type: <select id="lid">
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
			</div><br>
			<div>Year: <input type="text" value="<?php echo $row['year']?>" id="yr"></div><br>
			<div>Winery: <select id="lid">
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
						</div><br>
			<div>Description: <textarea id="wd" cols="30" rows="5"><?php echo $row['description']?></textarea></div><br>
			<input type="submit" value="UPDATE">
		</form>
	<?php
		if(isset($_REQUEST['wn'])){
			include("wines.php");
			$obj1 = new wines();
			$wn = $_REQUEST['wn'];
			$wt=$_REQUEST['type_id'];
			$yr = $_REQUEST['yr'];
			$wid = $_REQUEST['winery_id'];
			$des = $_REQUEST['wd'];
			
			$obj1->edit_wine($wn, $wt, $yr, $wid, $des);
			
			header("Location: viewAfterLogIn.php");
		}
		?>
	</body>
</html>