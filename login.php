<?php
	if(isset($_REQUEST['uname'])){
		session_start();
		include_once("wines.php");
		$uname = $_REQUEST['uname'];
		$p_word = $_REQUEST['pwd'];	
		$obj = new wines();
		$row = $obj->validation($uname,$p_word);
		if(!$row){
			echo "Ooops! Wrong credentials... :(";
		}	else{
			$_SESSION['cust_id'] = $row['cust_id'];
			$_SESSION['uname'] = $row['user_name'];
			$_SESSION['pwd'] = $_REQUEST['password'];
			header("location:viewAfterLogIn.php");
		}
	}
?>
<html>
	<head>
		<title>Sign-In</title>
		<script src="jquery-2.1.3.js"></script>
	<script>
	
		function sendRequest(requestURL){
			var obj = $.ajax({url:requestURL, async:false});
			var response =$.parseJSON(obj.responseText);
			return response;	
		}
		
		function login(username, password){
			var response = sendRequest("user_method.php?cmd=1&username="+username+"&password="+password);
			divContent.innerHTML=response.message;
		}
		
		function validate(){
			var valid = validatePassword();
			if(valid){
				var response = login(username.value, password.value);	
			}
		}
		
		function validatePassword(){
			var password = password.value;
			var username = psername.value;
			var pErr =false;
			var uErr=false;
			if(password.length<1){
				password.style.backgroundColor="red";
				pErr=true;
			}
			if(username.length<1){
				username.style.backgroundColor="red";
				uErr=true;
			}
			if(pErr==false&&uErr==false){
				return true;
			}
			return false;
			
			
		}
	</script>
	</head>
	<body>
		<div id="divContent"></div>
		<div id="login">
			<form method="POST" action="login.php">
				User<br><input type="text" placeholder="username" name="uname" size="40" required><br>
				Password<br><input type ="password" placeholder="password" name="pwd" size="40" required><br>
				<input id="button" type="submit" value="Log-In">
			</form>
		</div>	
	</body>
</html>