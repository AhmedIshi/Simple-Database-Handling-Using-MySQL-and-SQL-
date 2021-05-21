<?php
 include "connection.php";
 $doctorId = $_GET['id'];
 $query = "DELETE FROM `all_doctors` WHERE `doctorId` = $doctorId";
 mysqli_query($con, $query);
 header("location: ShowDocRec.php");
?>