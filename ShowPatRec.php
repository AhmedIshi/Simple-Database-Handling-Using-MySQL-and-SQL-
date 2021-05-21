<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-wEmeIV1mKuiNpC+IOBjI7aAzPcEZeedi5yW5f2yOq55WWLwNGmvvx4Um1vskeMj0" crossorigin="anonymous">
  <link rel="stylesheet" href="style.css" />
  <title>View Doctor Record</title>
  <style>
  /* div
  {
    padding-left: 40%;
  } */
  .container-fluid
  {
    padding: 10%;
  }
  /* h2{text-align: center;} */
  
  </style>
  <script>
    function defaultt() {
      
      document.getElementById("Discharge").style.display = "none";
      document.getElementById("Admit").style.display = "none";
      document.getElementById("Operate").style.display = "none";
      }
      function pattt() {
        var regular = document.getElementById("Regular");
        var discharge = document.getElementById("Discharge");
        var admit = document.getElementById("Admit");
        var operation = document.getElementById("Operate");
        var status = document.getElementById("patientStatus").value;
        if (status == "Regular") {
          regular.style.display = "block";
          admit.style.display = "none";
          operation.style.display = "none";
          discharge.style.display = "none";
        } else if (status == "Admit") {
          regular.style.display = "none";
          admit.style.display = "block";
          operation.style.display = "none";
          discharge.style.display = "none";
        } else if (status == "Discharge") {
          regular.style.display = "none";
          admit.style.display = "none";
          operation.style.display = "none";
          discharge.style.display = "block";
        } else if (status == "Operate") {
          regular.style.display = "none";
          operation.style.display = "block";
          admit.style.display = "none";
          discharge.style.display = "none";
        }
      }
   
  </script>
</head >

<body class="fluid" onload="defaultt()">

<h2>View Patient Record</h2><br><br>

<div class="form-row col-md-12">
         <div class="form-group col-md-3">
         <label for="patientStatus"></label>
            &nbsp;<select
              id="patientStatus"
              class="form-control"
              onchange="pattt();"
              name="patientStatus"
            >
              <option value="Regular" >Regular Patient</option>
              <option value="Admit">Patient Admit</option>
              <option value="Discharge">Patient Discharge</option>
              <option value="Operate">Patient Operation</option>
            </select>
         </div>
        </div><br>
        <div id="Regular">
  <table class="table table-bordered" >
		<tr>
			<th>patientNumber</th>
			<th>doctorId</th>
      <th>patientName</th>
			<th>Age</th>
			<th>Sex</th>
			<th>city</th>
			<th>phoneNumber</th>
			<th>dateOfCheckup</th>
			<th>medicineRecommended</th>
			<th>treatmentStatus</th>
      <th style = "text-align: center;">Action</th>
		
		</tr>
<?php
 include "connection.php";
$query = "SELECT * FROM `pat_entry` NATURAL JOIN pat_chkup NATURAL JOIN pat_reg";

$q=mysqli_query($con, $query);

while ($res=mysqli_fetch_array($q)) {
?>
		<tr>
			<td><?php echo "PT00" . $res['patientNumber']; ?></td>
			<td><?php echo "DR00" . $res['doctorId']; ?></td>
			<td><?php echo $res['patientName']; ?></td>
      <td><?php echo $res['age']; ?></td>
      <td><?php echo $res['sex']; ?></td>
      <td><?php echo $res['city']; ?></td>
      <td><?php echo $res['phoneNumber']; ?></td>
      <td><?php echo $res['dateOfCheckup']; ?></td>
      <td><?php echo $res['medicineRecommended']; ?></td>
      <td><?php echo $res['treatmentStatus']; ?></td>
      
      <td><a href="update.php?id=<?php echo $res['patientNumber']; ?>"><button class="btn btn-warning">Edit</button></a>
			<a href="deletePatientRec.php?id=<?php echo $res['patientNumber']; ?>"><button class="btn btn-danger">Delete</button></a></td>
		</tr>
<?php 
} 
?>
  </table>
  </div>
  <div id="Discharge">
  <table class="table table-bordered" >
		<tr>
			<th>patientNumber</th>
			<th>doctorId</th>
      <th>patientName</th>
			<th>Age</th>
			<th>Sex</th>
			<th>city</th>
			<th>phoneNumber</th>
			<th>dateOfCheckup</th>
			<th>paymentMade</th>
			<th>paymentMode</th>
			<th>dischargeDate</th>
      <th style = "text-align: center;">Action</th>
		
		</tr>
<?php
 include "connection.php";
$query = "SELECT * FROM `pat_entry` NATURAL JOIN pat_chkup NATURAL JOIN pat_dis";

$q=mysqli_query($con, $query);

while ($res=mysqli_fetch_array($q)) {
?>
		<tr>
			<td><?php echo "PT00" . $res['patientNumber']; ?></td>
			<td><?php echo "DR00" . $res['doctorId']; ?></td>
			<td><?php echo $res['patientName']; ?></td>
      <td><?php echo $res['age']; ?></td>
      <td><?php echo $res['sex']; ?></td>
      <td><?php echo $res['city']; ?></td>
      <td><?php echo $res['phoneNumber']; ?></td>
      <td><?php echo $res['dateOfCheckup']; ?></td>
      <td><?php echo $res['paymentMade']; ?></td>
      <td><?php echo $res['paymentMode']; ?></td>
      <td><?php echo $res['dischargeDate']; ?></td>
      
      <td><a href="update.php?id=<?php echo $res['patientNumber']; ?>"><button class="btn btn-warning">Edit</button></a>
			<a href="deletePatientRec.php?id=<?php echo $res['patientNumber']; ?>"><button class="btn btn-danger">Delete</button></a></td>
			
		</tr>
<?php 
} 
?>
  </table>
  </div>
<!-- Doctor On Call -->
<div id="Admit">
  <table class="table table-bordered" >
		<tr>
			<th>patientNumber</th>
			<th>doctorId</th>
      <th>patientName</th>
			<th>Age</th>
			<th>Sex</th>
			<th>city</th>
			<th>phoneNumber</th>
			<th>roomStatus</th>
			<th>admissionDate</th>
			<th>roomType</th>
			<th>attendantName</th>
			<th>NumOfDoctor</th>
      <th style = "text-align: center;">Action</th>
		
		</tr>
<?php
 include "connection.php";
$query = "SELECT * FROM `pat_entry` NATURAL JOIN pat_chkup NATURAL JOIN pat_admit INNER JOIN room_details ON pat_admit.patientNumber = room_details.patientNumber";

$q=mysqli_query($con, $query);

while ($res=mysqli_fetch_array($q)) {
?>
		<tr>
			<td><?php echo "PT00" . $res['patientNumber']; ?></td>
			<td><?php echo "DR00" . $res['doctorId']; ?></td>
			<td><?php echo $res['patientName']; ?></td>
      <td><?php echo $res['age']; ?></td>
      <td><?php echo $res['sex']; ?></td>
      <td><?php echo $res['city']; ?></td>
      <td><?php echo $res['phoneNumber']; ?></td>
      <td><?php echo $res['roomStatus']; ?></td>
      <td><?php echo $res['admissionDate']; ?></td>
      <td><?php echo $res['roomType']; ?></td>
      <td><?php echo $res['attendentName']; ?></td>
      <td><?php echo $res['numOfDoctor']; ?></td>
      
      <td><a href="update.php?id=<?php echo $res['patientNumber']; ?>"><button class="btn btn-warning">Edit</button></a>
			<a href="deletePatientRec.php?id=<?php echo $res['patientNumber']; ?>"><button class="btn btn-danger">Delete</button></a></td>
			
		</tr>
<?php 
} 
?>
  </table>
  </div>

  <div id="Operate">
  <table class="table table-bordered" >
		<tr>
			<th>patientNumber</th>
			<th>doctorId</th>
      <th>patientName</th>
			<th>Age</th>
			<th>Sex</th>
			<th>city</th>
			<th>phoneNumber</th>
			<th>dateOfCheckup</th>
			<th>admissionDate</th>
			<th>OperationDate</th>
			<th>docInOpr</th>
			<th>OperationType</th>
      <th style = "text-align: center;">Action</th>
		
		</tr>
<?php
 include "connection.php";
$query = "SELECT * FROM `pat_entry` NATURAL JOIN pat_chkup NATURAL JOIN pat_opr";

$q=mysqli_query($con, $query);

while ($res=mysqli_fetch_array($q)) {
?>
		<tr>
			<td><?php echo "PT00" . $res['patientNumber']; ?></td>
			<td><?php echo "DR00" . $res['doctorId']; ?></td>
			<td><?php echo $res['patientName']; ?></td>
      <td><?php echo $res['age']; ?></td>
      <td><?php echo $res['sex']; ?></td>
      <td><?php echo $res['city']; ?></td>
      <td><?php echo $res['phoneNumber']; ?></td>
      <td><?php echo $res['dateOfCheckup']; ?></td>
      <td><?php echo $res['admissionDate']; ?></td>
      <td><?php echo $res['operationDate']; ?></td>
      <td><?php echo $res['doctorInOpr']; ?></td>
      <td><?php echo $res['operationType']; ?></td>
      
      <td><a href="update.php?id=<?php echo $res['patientNumber']; ?>"><button class="btn btn-warning">Edit</button></a>
			<a href="deletePatientRec.php?id=<?php echo $res['patientNumber']; ?>"><button class="btn btn-danger">Delete</button></a></td>
			
		</tr>
<?php 
} 
?>
  </table>
  </div>


  <div class = "col-md-12">
  <a href="DoctorRecord.html"><button type="button" class="btn btn-success col-md-2" style= "text-align:center;" >Add Doctor Record</button></a>
  <a href="PatientRecord.html"><button type="button" class="btn btn-success col-md-2" style= "text-align:center;" >Add Patient Record</button></a>
</div>
 

</body>
</html>
