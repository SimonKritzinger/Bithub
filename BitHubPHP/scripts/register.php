<?php
session_start();
$db = @new mysqli("localhost","root","","tp_website");
if(mysqli_connect_errno())
	echo "Connectionerror: " . mysqli_connect_error();
else{
	$sql = "SELECT * FROM user WHERE umail like ?";
	$stmt = $db->prepare($sql);
	if(!$stmt){
			
	}
	else{
		$stmt->bind_param("s",$mail);
		$mail = $db->real_escape_string($_POST["email"]);
		$stmt->execute();
		if($stmt->num_rows > 0){
			echo("fehler");
		}
		else{
		    $stmt->close();
		    $sql = "INSERT INTO user(uusername, uname, ulastname, ubirth, umail, uhash, ucompany, ucreate, ucolor) 
                VALUES (?,?,?,?,?,?,?, NOW(),?)";
		    $username = $db->real_escape_string($_POST["username"]);
		    $name = $db->real_escape_string($_POST["name"]);
		    $lastname = $db->real_escape_string($_POST["lastname"]);
		    $pswd = password_hash($db->real_escape_string($_POST["password"]),PASSWORD_BCRYPT);
		    $birth = $db->real_escape_string(date('Y-m-d', strtotime(str_replace('.', '-', $_POST["birth"]))));
		    $company = $db->real_escape_string($_POST["company"]);
		    $color = $db->real_escape_string($_POST["color"]);
		    $stmt = $db->prepare($sql);
		    if(!$stmt){
		        
		    }
		    else{
		        $stmt->bind_param("sssbssss",$username,$name,$lastname,$birth,$mail,$pswd,$company,$color);
		        $stmt->execute();
		        if($db->errno)
		            echo($db->error);
		        else 
		            $_SESSION["usermail"] = $mail;
		    }
		$stmt->close();
	}
	}
	$db->close();
}
?>