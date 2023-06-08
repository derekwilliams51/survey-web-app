<html>
<head>
<style> 
  table, tr, th, td {
    border: 1px solid black;
    border-collapse: collapse;
    padding: 15px;
  }

  th, td {
    padding: 20px;
  }
</style>
</head>
<body>

<?php

ini_set('display_errors',1);
ini_set('display_startup_errors',1);
error_reporting(E_ALL);

/* 
** This file will retrieve data from the database named 
** 'patient_expert_survey' on localhost and create a text
** table of the names, emails, and id's of all patients
** in the database. Will also generate a button to directly
** create the word cloud for each patient.
** 
** Fill in system user name and password in the fields below
**
*/

$servername = "localhost";
$username = "";
$password = "";
$dbname = "patient_expert_survey";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
} 

$sql = "SELECT * FROM patient_expert";

//$sql = "SELECT id, firstname, lastname, email FROM patient_expert";
$result = mysqli_query($conn,$sql);

echo "<h2> Database Entries: </h2>";

echo "<table><tr><th>ID</th><th>First Name</th><th>Last Name</th><th>Email</th><th>See Word Cloud</th></tr>";


//if ($result->num_rows > 0) {
  // output data of each row
  while($row = mysqli_fetch_assoc($result)) {
    echo "<tr>";
      echo "<td>" . $row["id"] . "</td>"; 
      echo "<td>" . $row["first_name"] . "</td>";
      echo "<td>" . $row["last_name"] . "</td>";
	  echo "<td>" . $row["email"] . "</td>";
	  $wcValue = $row["id"];
	  echo "<td>" . "
<form id='form' action='USC_WordCloudGenerator.php' method='post'>
	 <input type='hidden' id='id' name='id'  value = $wcValue  />
     <input type='submit' value = 'Generate Word Cloud'>
</form>";


    echo "</tr>";
  }
   echo "</table>";
//} else {
//  echo "0 results";
//}


$conn->close();
?>

</body>
</html>
