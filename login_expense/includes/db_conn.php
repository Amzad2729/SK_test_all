





<!-- localhost database connection code -->

<?php

$servername = "localhost";
$username = "root";
$password = "";
$db_name = "expense";




// Create connection
$conn = mysqli_connect($servername, $username, $password, $db_name);

// Check connection
if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}
// echo "Connected successfully";
?>












<!-- amzad database connection code -->

<!-- <?php
// $servername = "sql212.infinityfree.com";
// $username = "if0_34959559";
// $password = "E4j3rQCkiR";
// $db_name = "if0_34959559_expense";

// Create connection
// $conn = mysqli_connect($servername, $username, $password, $db_name);

// Check connection
// if (!$conn) {
//   die("Connection failed: " . mysqli_connect_error());
// }
// echo "Connected successfully";

?> -->











<!-- shahidulkabir database connection code -->

<!-- <?php


// $servername = "sql306.infinityfree.com";
// $username = "if0_37463423";
// $password = "UUBsbAsE0L1gta";
// $db_name = "if0_37463423_expense";
// Create connection
// $conn = mysqli_connect($servername, $username, $password, $db_name);

// Check connection
// if (!$conn) {
//   die("Connection failed: " . mysqli_connect_error());
// }
// echo "Connected successfully";

?> -->