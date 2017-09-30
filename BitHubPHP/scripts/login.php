<?php
session_start();
	$db = @new mysqli("localhost","root","","tp_website");
	if(mysqli_connect_errno())
		echo "Connectionerror: " . mysqli_connect_error();
	else{
		$sql = "SELECT uhash FROM user WHERE umail like ?";
		$stmt = $db->prepare($sql); 
		if(!$stmt){
			
		}
		else{
			$mail = $db->real_escape_string($_POST["email"]);
			$stmt->bind_param("s",$mail);
			$stmt->execute();
			$stmt->store_result();
			$stmt->bind_result($dbhash);
			$stmt->fetch();
			echo($stmt->num_rows);
			if($stmt->num_rows == 1){
				if(password_verify($_POST["password"],$dbhash)){
					$_SESSION["usermail"] = $mail;
					$stmt->close();
					$sql = "SELECT uname, ulastname FROM user WHERE umail like ?";
					$stmt = $db->prepare($sql); 
					if(!$stmt){
					}
					else{
					    $stmt->bind_param("s",$mail);
					    $stmt->execute();
					    $stmt->store_result();
					    $stmt->bind_result($dbname, $dblastname);
					    $stmt->fetch();
					    $_SESSION["name"] = $dbname;
					    $_SESSION["lastname"] = $dblastname;
					
					}
				}
				else{
				    $_SESSION["loginerror"] = true;
				}
			}
			else{
			    $_SESSION["loginerror"] = true;
			}
			$stmt->close();
		}
		$db->close();
	}
	header("Location:../index.php");
	?>