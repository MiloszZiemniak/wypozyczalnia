<?php
session_start();

$conn = mysqli_connect('localhost', 'root', '1234', 'wypozyczalnia');
$id = $_POST['id'];
$sql = "DELETE from klient where id ='$id'";
$query = mysqli_query($conn, $sql);
?>