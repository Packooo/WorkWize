<?php 
$conn = mysqli_connect("localhost","root","","workwise");
if (!$conn) {
    die("Connection failed: ". mysqli_connect_error());
}

?>