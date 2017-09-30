  <?php 
  $id = $_SESSION["user_id"];
  	$mysqli = @new mysqli("localhost","root","masterkey","tp_website");
  	if (mysqli_connect_errno())
  		echo "Verbindungsfehler: " . mysqli_connect_error() . " Fehlernummer: " . mysqli_connect_errno();
  	else{
  		$result = mysql_query("SELECT * FROM users WHERE uuserid =".$id.";");
  		
  	}
  
  
  while($row = mysql_fetch_array($result)){
  	echo "snummer:".$row{'snummer'}." Name:".$row{'sname'}."<br>";
  }
  
  mysql_close($dbhandle);
  ?>
  
  
  
  
  
  <script>
function show(){
document.getElementById("show").style.display="";
 }
</script>
<p onclick="show();">Username:</p>
<form id="show" style="display: none;" action="options.php">
  <input type="text" name="id" value="id bearbeiten">
  <input type="submit" value="Submit">
</form> 
  
  
  
  
  
  
  
  	<p>userid</p>
  	<p>username</p>
  	<p>name</p>
  	<p>lastname</p>
  	<p>birth</p>
  	<p>mail</p>
  	<p>company</p>
  	<p>create</p>
  	<p>lastlogin</p>
  	<p>profpic</p>
  	<p>color</p>

    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="ajax.js"></script>
    <script src="bootstrap.js"></script> 
    <script src="ajaxpars.js"></script>
