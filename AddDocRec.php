<?php

    include "connection.php";

      

    if (($_POST['doctorStatus'] == 1) && isset($_POST['submit']))
    {
      $departName = $_POST['departName'];
      $departLocation = $_POST['departLocation'];
      $departFacilities = $_POST['departFacilities'];
      $doctorName = $_POST['doctorName'];
      $qualification = $_POST['qualification'];
      $address = $_POST['address'];
      $phoneNumber = $_POST['phoneNumber'];
      $joiningDate = $_POST['joiningDate'];
      $salary = $_POST['salary'];
    
      $query = "INSERT INTO `department`(`departName`, `departLocation`, `departFacilities`) VALUES ('$departName','$departLocation','$departFacilities')";
      mysqli_query($con, $query);

      $query1 = "INSERT INTO `all_doctors`(`departName`) VALUES('$departName')";
      mysqli_query($con, $query1);

      $lastId = mysqli_insert_id($con);


      $query2 = "INSERT INTO `doc_reg`( `doctorId`,`doctorName`, `qualification`, `address`, `phoneNumber`, `salary`, `joiningDate`) VALUES ($lastId,'$doctorName','$qualification','$address','$phoneNumber','$salary','$joiningDate')";
       mysqli_query($con, $query2);




    }else if ($_POST['doctorStatus'] == 2)
    {
      $departName2 = $_POST['departName2'];
      $doctorName2 = $_POST['doctorName2'];
      $qualification2 = $_POST['qualification2'];
      $address2 = $_POST['address2'];
      $phoneNumber2 = $_POST['phoneNumber2'];
      $paymentDue = $_POST['paymentDue'];
      $feePerCall = $_POST['feePerCall'];


      $query3 = "INSERT INTO `all_doctors`(`departName`) VALUES('$departName2')";
      mysqli_query($con, $query3);

      $lastId = mysqli_insert_id($con);

      $query4 = "INSERT INTO `doc_on_call`(`doctorId`, `doctorName`, `qualification`, `feePerCall`, `paymentDue`, `address`, `phoneNumber`)  VALUES ($lastId,'$doctorName2','$qualification2','$feePerCall','$paymentDue','$address2','$phoneNumber2')";
      mysqli_query($con, $query4);


    }
    else if($_POST['doctorStatus'] == 3)
    {
      $departName3 = $_POST['departName3'];
      $departLocation3 = $_POST['departLocation3'];
      $departFacilities3 = $_POST['departFacilities3'];
      $doctorName3 = $_POST['doctorName3'];
      $qualification3 = $_POST['qualification3'];
      $address3 = $_POST['address3'];
      $phoneNumber3 = $_POST['phoneNumber3'];
      $joiningDate3 = $_POST['joiningDate3'];
      $salary3 = $_POST['salary3'];
      $paymentDue3 = $_POST['paymentDue3'];
      $feePerCall3 = $_POST['feePerCall3'];

      // $query5 = "INSERT INTO `department`(`departName`, `departLocation`, `departFacilities`) VALUES ('$departName3','$departLocation3','$departFacilities3')";
      // mysqli_query($con, $query5);

      $query6 = "INSERT INTO `all_doctors`(`departName3`) VALUES('$departName3')";
      mysqli_query($con, $query6);

      $lastId = mysqli_insert_id($con);

      $query7 = "INSERT INTO `doc_reg`( `doctorId`,`doctorName`, `qualification`, `address`, `phoneNumber`, `salary`, `joiningDate`) VALUES ($lastId,'$doctorName3','$qualification3','$address3','$phoneNumber3','$salary3','$joiningDate3')";
      mysqli_query($con, $query7);

      $query8 = "INSERT INTO `doc_on_call`(`doctorId`, `doctorName`, `qualification`, `feePerCall`, `paymentDue`, `address`, `phoneNumber`)  VALUES ($lastId,'$doctorName3','$qualification3',$feePerCall3,$paymentDue3,'$address3','$phoneNumber3')";
      mysqli_query($con, $query8);



    }

    header("location: ShowDocRec.php");
 ?>