<?php
    include_once("wines.php");
    $obj= new wines();
    $wid = $_REQUEST['wid'];
    $obj->view_wine($wid);
    $row=$obj->fetch(); 
    echo "Wine Name : ".$row['wine_name']."<br>";
    echo "Winery : ".$row['winery_name']."<br>";
    echo "Quantity on Hand : ".$row['on_hand']."<br>";
    echo "Unit Price : ".$row['cost'];
    echo "<br/>";
    echo "Region : ".$row['region_name']."<br>";
?> 