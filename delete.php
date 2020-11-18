<?php

$conn = mysqli_init();
mysqli_real_connect($conn, 'itfraiden.mysql.database.azure.com', 'raiden@itfraiden', 'itf_12644', 'itf63070222', 3306);
if (mysqli_connect_errno($conn))
{
    die('Failed to connect to MySQL: '.mysqli_connect_error());
}

$ID = $_POST['ID'];
$sql = "DELETE FROM guestbook WHERE ID='$ID'";

if (mysqli_query($conn, $sql)) {
    echo "Record deleted successfully";
  } else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
  }
  
mysqli_close($conn);
?>
