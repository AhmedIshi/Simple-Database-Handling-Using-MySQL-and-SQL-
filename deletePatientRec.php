<?php
   include "connection.php";
   $patientNumber = $_GET['id'];
   $query = "DELETE FROM `pat_entry` WHERE `patientNumber` = $patientNumber";
   mysqli_query($con, $query);
  header ("location: ShowPatientRec.php");
 ?>