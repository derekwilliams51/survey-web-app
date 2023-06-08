<html>
<body>
<?php
$servername = "localhost";
/* 
** This file will create a new database on localhost named
** patient_expert_survey. If the DB can not be created,
** an error message will be shown.
** 
** Fill in system user name and password in the fields below
** Change the port #3306 to correct port for your mysql DB 
** installation
**
*/
    
$username = "";
$password = "";

// Create connection
$conn = new mysqli($servername, $username, $password, "", 3306);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
} 

// Create database
$sql = "CREATE DATABASE patient_expert_survey";
if ($conn->query($sql) === TRUE) {
  echo "Database patient_expert_survey created successfully";
} else {
  echo "Error creating database: " . $conn->error;
}

$conn->close();
?>

</body>
</html>
