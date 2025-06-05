<?php
$conn = new mysqli("db", "exampleuser", "examplepass", "exampledb");
if ($conn->connect_error) {
    echo "Error : " . $conn->connect_error;
}
?>