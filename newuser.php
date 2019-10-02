<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST')
{

include 'connect.php';

if (!isset( $_POST['submit'] )) {
    echo "<p>ERROR form was not submitted</p>";
}
else {
    $sql = "insert into users (firstname, surname, email, password) values ('".$_POST['fname']."','".$_POST['sname']."','".$_POST['email']."','".$_POST['pass']."')";

    if (!$mysqli->query($sql)) {
echo "Error: "$mysqli->error;
    }
    else {
        //here we could redirect he user back to another page or simple output a success message
    } 
    $mysqli->close();
}
}
else {
?>
<!DOCTYPE html>
<html>
<head>
<title>Add user</title>
</head>
<body>
<h1>Add record</h1>
<form action="newuser.php" method="post" >
   Firstname: <input type="text" id="fname" name="fname"/>
   Surname: <input type="text" id="sname" name="sname"/>
   Email: <input type="text" id="email" name="email"/>
   Password: <input type="text" id="pass" name="pass"/>
   <input type="submit" id="submit" name="submit" value="submit"/>
</form>
</body>
</html>
<?php
}
?>
