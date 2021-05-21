<?php

include "connection.php";

if (isset($_POST['submit']))
{
  $firstname = $_POST['firstname'];
  $lastname = $_POST['lastname'];
  $patientName = $firstname . " " . $lastname;
  $address = $_POST['address'];
  $phoneNumber = $_POST['phoneNumber'];
  $city = $_POST['city'];
  $age = $_POST['age'];
  $gender = $_POST['gender'];
  $referredDoctor = $_POST['referredDoctor'];
  $departName = $_POST['departName'];
  $checkupDate = $_POST['checkupDate'];
  $treatment = $_POST['treatment'];
  $patientStatus = $_POST['patientStatus'];
  $diagnose = $_POST['diagnose'];


  $query = "SELECT * FROM `doc_reg` WHERE `doctorName` = '$referredDoctor'";
   $result = mysqli_query($con, $query);
   $doctorId =  mysqli_fetch_array($result);
   $doctorId = $doctorId['doctorId'];


  $query1 = "INSERT INTO `pat_entry`(`patientName`, `doctorId`, `departName`, `age`, `sex`, `address`, `city`, `phoneNumber`, `diagnosis`, `entryDate`) VALUES ('$patientName',$doctorId,'$departName',$age,'$gender','$address','$city',$phoneNumber,'$diagnose','$checkupDate')";
  $result = mysqli_query($con, $query1);

  $lastId = mysqli_insert_id($con);

  $query2 = "INSERT INTO `pat_chkup`(`patientNumber`, `doctorId`, `diagnosis`, `treatment`, `dateOfCheckup`, `patient_status`) VALUES ($lastId,$doctorId,'$diagnose','$treatment','$checkupDate','$patientStatus')";
  mysqli_query($con, $query2);

  if($patientStatus == "Regular" )
  {
    // Regular Patient
  $visitDate = $_POST['visitDate'];
  $recMed = $_POST['recommendedMed'];
  $treatmentStatus = $_POST['treatmentStatus'];

    $query = "INSERT INTO `pat_reg`(`patientNumber`, `diagnosis`, `treatment`, `medicineRecommended`, `treatmentStatus`) VALUES ($lastId,'$diagnose','$treatment','$recMed','$treatmentStatus')";
    mysqli_query($con, $query);

  }else if($patientStatus == "Admit" ) // Patient Admit
  {
     // patient Admit
  $advancePayment = $_POST['advancePayment'];
  $admissionDate = $_POST['admissionDate'];
  $paymentMode1 = $_POST['paymentMode1'];
  $initialCondition = $_POST['initialCondition'];
  $attendantName = $_POST['attendantName'];
  $noOfDoc = $_POST['noOfDoc'];
  $roomType = $_POST['roomType'];
  $roomStatus = $_POST['roomStatus'];
  $chargesPerDay = $_POST['chargesPerDay'];

    $query = "INSERT INTO `pat_admit`(`patientNumber`, `departName`, `doctorId`, `advancePayment`, `paymentMode`, `admissionDate`, `initialCondition`, `diagnosis`, `treatment`, `attendentName`, `numOfDoctor`) VALUES ($lastId,'$departName','$doctorId','$advancePayment','$paymentMode1','$admissionDate','$initialCondition','$diagnose','$treatment','$attendantName', '$noOfDoc')";
    mysqli_query($con, $query);

    $query2 = "INSERT INTO `room_details`( `patientNumber`, `roomType`, `roomStatus`, `chargesPerDay`) VALUES ($lastId,'$roomType','$roomStatus', '$chargesPerDay')";
    mysqli_query($con, $query2);

  }else if ($patientStatus == "Discharge")
  {
     // Patient Discharge
  $treatmentGiven = $_POST['treatmentGiven'];
  $treatmentAdvice = $_POST['treatAdvice'];
  $paymentMode =  $_POST['paymentMode'];
  $paymentMade = $_POST['paymentMade'];
  $dischargeDate = $_POST['dischargeDate'];

  $query = "INSERT INTO `pat_dis`(`patientNumber`, `treatment`, `treatmentAdvice`, `paymentMade`, `paymentMode`, `dischargeDate`) VALUES ($lastId,'$treatmentGiven','$treatmentAdvice',$paymentMade,'$paymentMode','$dischargeDate')";
  mysqli_query($con, $query);


  }else if ($patientStatus == "Operate")
  {
     // Operation
  $admissionDate1 = $_POST['admissionDate1'];
  $operationDate = $_POST['operationDate'];
  $operationType = $_POST['operationType'];
  $PCAfterOpr = $_POST['PCAfterOpr'];
  $PCBeforOpr = $_POST['PCBeforeOpr'];
  $treatmentAdvice1 = $_POST['treatmentAdvice1'];
  $theatreNum = $_POST['theatreNum'];
  $doctorInOpr = $_POST['doctorInOpr'];

  $query = "INSERT INTO `pat_opr`(`patientNumber`, `doctorId`, `departName`, `admissionDate`, `operationDate`, `doctorInOpr`, `opTheatreNum`, `operationType`, `PCAfterOpr`, `PCBeforeOpr`, `treatment`) VALUES ($lastId,$doctorId,'$departName','$admissionDate1','$operationDate'
  ,$doctorInOpr,$theatreNum,'$operationType','$PCAfterOpr','$PCBeforOpr','$treatmentAdvice1')";

  mysqli_query($con, $query);


  }


  header("location: ShowPatRec.php");
 


}
 ?>