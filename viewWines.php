<html>
	<head>
		<title>Wine List</title>
	</head>

	<body>
		<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
		<script>
			 function loadViewWine(wid){
                $("#contentSpace").load("fullview.php?wid=" + wid);
				curId=wid;
				exit.hidden=false;
            }

            function exitView(){
				contentSpace.innerHTML="";
				exit.hidden=true;
			 }
		</script>

		<span style="color:red;cursor:pointer" id="exit" onclick="exitView()" hidden="true"><b>Exit</b></span>
		<div id="contentSpace"></div>
	</body>
<?php
		include_once ("adb.php");

		include("wines.php");
		$obj = new wines();
		$obj->view_wines();

		echo "<table border='1'>";
		echo "<tr style='background-color:purple; color:white;text-align:center'>
			<td>Wine ID</td><td>Wine Name</td><td>Wine Type</td><td>Year</td>
			<td>Winery</td></tr>";
		
		while($row=$obj->fetch()){

			echo "<tr onclick='loadViewWine($row[wine_id])' style='cursor:pointer'><td>{$row['wine_id']}</td><td>{$row['wine_name']}</td><td>{$row['wine_type']}</td><td>{$row['year']}</td><td>{$row['winery_name']}</td></tr>";
		}
		echo "</table>";
?>
</html>