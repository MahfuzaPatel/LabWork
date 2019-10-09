<?php
include 'connect.php';

$sql = "SELECT ID, firstname, lastname, email FROM users";
$result = $mysqli->query ($sql);
if ($result){
if ($result->num_rows > 0) {
                                echo "<table>";
                                echo "<tr>";
                                echo "<th>ID</th>";
                                echo "<th>Firstname</th>";
                                echo "<th>Surname</th>";
                                echo "<th>Email</th>";
                                echo "</tr>";
    while($row = $result->fetch_assoc())
    {
        // output data of each row
          echo "<tr>";
          echo "<td>".$row['ID']."</td>";
          echo "<td>".$row['firstname']."</td>";
          echo "<td>".$row['lastname']."</td>";
          echo "<td>".$row['email']."</td>";
          echo '<td><a href="edit.php?id='.$row["ID"].'">Edit</a></td>';
          echo "</tr>";
      }
      echo "</table>";
	  
} else {
    echo "0 results";
}
$result->close();
$mysqli->close();
}
?>
