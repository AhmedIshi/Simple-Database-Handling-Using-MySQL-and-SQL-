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
        document.getElementById("onCall").style.display = "none";
      }
    function pattt() {
        var regularDoctor = document.getElementById("regular");
        var docOnCall = document.getElementById("onCall");
        var status = document.getElementById("doctorStatus").value;

        if (status == "1") {
          regularDoctor.style.display = "block";
          docOnCall.style.display = "none";
        } else if (status == "2") {
          regularDoctor.style.display = "none";
          docOnCall.style.display = "block";
        }
      }
  </script>
</head >

<body class="container-fluid" onload="defaultt()">

<h2>View Doctor Record</h2><br><br>

<div class="form-row col-md-12">
          <div class="form-group col-md-3">
            <label for="doctorStatus"></label>
            <select
              id="doctorStatus"
              name="doctorStatus"
              class="form-control"
              onchange="pattt();"
            >
              <option value="1">Regular Doctor</option>
              <option value="2">Doctor On Call</option>
            </select>
          </div>

        </div><br>
  <div id="regular">
  <table class="table table-bordered" >
		<tr>
			<th>Doctor ID</th>
			<th>Department Name</th>
			<th>Doctor Name</th>
      <th>Qualification</th>
			<th>Address</th>
			<th>Phone Number</th>
			<th>Salary</th>
			<th>joiningDate</th>
      <th style = "text-align: center;">Action</th>
		
		</tr>
<?php
 include "connection.php";
$query = "SELECT * FROM `all_doctors` NATURAL JOIN doc_reg";

$q=mysqli_query($con, $query);

while ($res=mysqli_fetch_array($q)) {
?>
		<tr>
			<td><?php echo "DR00" . $res['doctorId']; ?></td>
			<td><?php echo $res['departName']; ?></td>
			<td><?php echo $res['doctorName']; ?></td>	
      <td><?php echo $res['qualification']; ?></td>	
      <td><?php echo $res['address']; ?></td>
      <td><?php echo $res['phoneNumber']; ?></td>
      <td><?php echo $res['salary']; ?></td>
      <td><?php echo $res['joiningDate']; ?></td>
      
      <td><a href="updateDocRec.php?id=<?php echo $res['doctorId']; ?>&doctorStatus=Regular Doctor&status=1"><button class="btn btn-warning">Edit</button></a>
			<a href="deleteDocRec.php?id=<?php echo $res['doctorId']; ?>"><button class="btn btn-danger">Delete</button></a></td>
			
		</tr>
<?php 
} 
?>
  </table>
  </div>
<!-- Doctor On Call -->
  <div id="onCall">
  </table>
  <table class="table table-bordered" >
		<thead class="thead-light">
			<th>Doctor ID</th>
			<th>Department Name</th>
			<th>Doctor Name</th>
      <th>Qualification</th>
			<th>Fee Per Call</th>
			<th>Payment Due</th>
			<th>Address</th>
			<th>Phone Number</th>
    
      <th style = "text-align: center;">Action</th>
		
		</thead>
<?php
 include "connection.php";
$query = "SELECT * FROM `all_doctors` NATURAL JOIN doc_on_call";



$q=mysqli_query($con, $query);


while ($res=mysqli_fetch_array($q)) {
?>
		<tr>
			<td><?php echo "DC00" . $res['doctorId']; ?></td>
			<td><?php echo $res['departName']; ?></td>
			<td><?php echo $res['doctorName']; ?></td>	<td><?php echo $res['qualification']; ?></td>	<td><?php echo $res['feePerCall']; ?></td>
      <td><?php echo $res['paymentDue']; ?></td>
      <td><?php echo $res['address']; ?></td>
      <td><?php echo $res['phoneNumber']; ?></td>
   
      <td><a href="updateDocRec.php?id=<?php echo $res['doctorId']; ?>&doctorStatus=Doctor On Call&status=2 "><button class="btn btn-warning">Edit</button></a>
			<a href="deleteDocRec.php?id=<?php echo $res['doctorId']; ?>"><button class="btn btn-danger">Delete</button></a></td>
			
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
