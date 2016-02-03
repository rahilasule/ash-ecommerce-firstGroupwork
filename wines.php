<?php
/**
 * author: Rahila Sule
 * description: A class to manage wine database. This class communicates(queries) with DB
 */
include_once ("adb.php");

class wines extends adb{
	//constructor for wine class
	function wines(){
	}

	function view_wines(){
		$str_query="SELECT wine_id, wine_name, wine_type.wine_type, year, winery_name FROM wine 
			JOIN wine_type ON wine.wine_type=wine_type.wine_type_id
			JOIN winery ON wine.winery_id=winery.winery_id
			ORDER BY wine.wine_id";
		return $this->query($str_query);
	}

	function view_wines_copy(){
		$str_query="SELECT wine_id, wine_name, wine_type.wine_type, year, winery_name FROM wine 
			JOIN wine_type ON wine.wine_type=wine_type.wine_type_id
			JOIN winery ON wine.winery_id=winery.winery_id
			ORDER BY wine.wine_id";
		return $this->query($str_query);
	}
	function view_wine($id){
		$wid=$id;
		$str_query="SELECT wine.wine_name, winery.winery_name, inventory.on_hand, inventory.cost, region.region_name  FROM wine 
			JOIN winery ON wine.winery_id=winery.winery_id
			JOIN inventory ON wine.wine_id=inventory.wine_id
			JOIN region ON winery.region_id=region.region_id
			WHERE wine.wine_id=$wid";
		return $this->query($str_query);
	}

	function sortBy($field){
		$field=$field;
		$str_query="SELECT DISTINCT wine.wine_id, wine.wine_name, items.price FROM wine 
		JOIN items ON wine.wine_id=items.wine_id WHERE items.qty=1 
		ORDER BY $field ASC";
		return $this->query($str_query);
	}

	function browseBy($cat){
		$cat=$cat;
		$str_query="SELECT wine_id, wine_name, wine_type.wine_type, year, winery_name FROM wine 
			JOIN wine_type ON wine.wine_type=wine_type.wine_type_id
			JOIN winery ON wine.winery_id=winery.winery_id WHERE wine_type.wine_type='$cat'
			ORDER BY wine.wine_id";
		return $this->query($str_query);
	}

	function get_wine($wid){
		$str_query="SELECT wine_id, wine_name, wine_type, year, winery_id, description FROM wine
			WHERE wine_id=$wid";
			return $this->query($str_query);
	}	
	function get_winery(){
		$str_query="SELECT winery_id, winery_name FROM winery
			ORDER BY winery_id";
		return $this->query($str_query);
	}

	function get_wine_type(){
		$str_query="SELECT wine_type_id, wine_type FROM wine_type
			WHERE wine_type_id != 1
			ORDER BY wine_type_id";
		return $this->query($str_query);
	}

	function add_wine($wn, $wt, $yr, $wid, $des){
		$str_query="INSERT INTO wine SET wine_name='$wn', wine_type=$wt, year=$yr, winery_id=$wid, description=$des";
		return $this->query($str_query);
	}	

	function edit_wine($wid, $wn, $wt, $yr, $wid, $des){
		$str_query="UPDATE wine SET wine_name='$wn', wine_type=$wt, year=$yr, winery_id=$wid, description=$des
			WHERE wine.wine_id= $wid";
		return $this->query($str_query);
	}

	function search_wines($str){
		$search_text=$str;
		$str_query="SELECT wine_id, wine_name, wine_type.wine_type, year, winery_name FROM wine 
			JOIN wine_type ON wine.wine_type=wine_type.wine_type_id 
			JOIN winery ON wine.winery_id=winery.winery_id
			WHERE wine_name LIKE '%$search_text%'
			ORDER BY wine.wine_id";
		return $this->query($str_query);
	}

	function validation($uname, $pwd){
        $str_query = "SELECT * FROM users
			WHERE user_name='$uname' AND password='$pwd'";
			
		if($this->query($str_query)){
			return $this->fetch();				
		}
			return false;	
	}
}
?>