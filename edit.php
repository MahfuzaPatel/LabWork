<?php

include 'connect.php';

if (isset( $_POST['submit'] )) //NB this implies you called your submit button “submit” !
{
  $updatequery ="UPDATE users SET firstname=?, surname=?, email=?, password=? WHERE id=?";

$stmt = $mysqli->prepare($updatequery);

$stmt->bind_param('sssss', $_POST['fname'], $_POST['sname'], $_POST['email'], $_POST['pass'], $_GET['id']);

	
	
    if (!$stmt->execute()) {
        echo "Error: ".$mysqli->error;
    }
    else {
        echo "<p>Record updated successfully</p>";
        echo "<a href=\"users.php\">Back</a>";
    } 
    $mysqli->close();
}
else
{
  $populatequery = "SELECT * from users WHERE ID='".$_GET['id']."'";
  $result = $mysqli->query ($populatequery);
  if ($result){
    if ($result->num_rows > 0) {
      while($row = $result->fetch_assoc()) { 
          $fn = $row['firstname'];
	      $sn = $row['lastname'];
	      $em = $row['email'];
	      $pw = $row['password'];
        }    
    }
  }
}
?>
<h1>Edit record:</h1>
<form action="edit.php?id=<?php echo $_GET['id']; ?>" method="post" >
   Firstname: <br>
<input class="form-control" type="text" id="fname" name="fname" value="<?php echo "$fn"; ?>"/><br>
   Surname: <br>
<input class="form-control" type="text" id="sname" name="sname" value="<?php echo"$sn"; ?>"/><br>
   Email: <br>
<input class="form-control" type="text" id="email" name="email" value="<?php echo"$em"; ?>"/><br>
   Password: <br>
<input class="form-control" type="password" id="pass" name="pass" value="<?php echo"$pw"; ?>"/><br>
<input class="btn btn-primary" type="submit" id="submit" name="submit" value="submit"/>
</form>	
</div>
</body>
</html>
