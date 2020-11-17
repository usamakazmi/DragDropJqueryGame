<?php
/* Attempt MySQL server connection. Assuming you are running MySQL
server with default setting (user 'root' with no password) */
$link = mysqli_connect("localhost", "root", "", "demo");
 
// Check connection
if($link === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}
 
// Escape user inputs for security
$first_name = mysqli_real_escape_string($link, $_REQUEST['sname']);
$last_name = mysqli_real_escape_string($link, $_REQUEST['sscore']);
$email = mysqli_real_escape_string($link, $_REQUEST['stime']);
 
// Attempt insert query execution
$sql = "INSERT INTO scoreboard (name, score, time) VALUES ('$first_name', '$last_name', '$email')";
if(mysqli_query($link, $sql)){
    echo "Records added successfully.";
} else{
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
}


 
// Close connection
mysqli_close($link);
?>
