<?php
include "connection.php";
$doctorId = $_GET['id'];
if(isset($_POST['submit']))
{
  $doctorName = $_POST['doctorName'];
  $qualification = $_POST['qualification'];
  $address = $_POST['address'];
  $phoneNumber = $_POST['phoneNumber'];
  $joiningDate = $_POST['joiningDate'];
  $salary = $_POST['salary'];
  
  
  $query1 ="UPDATE `doc_reg` SET  `doctorName`='$doctorName',`qualification`='$qualification',`address`='$address',`phoneNumber`=$phoneNumber,`salary`=$salary,`joiningDate`='$joiningDate' WHERE `doctorId` = $doctorId " ;
    mysqli_query($con,$query1);
  
  header("location: ShowDocRec.php");
}



 ?>
 
 <!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link
      rel="stylesheet"
      href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css"
    />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="style.css" />
    <title>Doctor Record</title>
  </head>
  <body>

  <?php

      include "connection.php";
      $doctorId = $_GET['id'];

      if($_GET['status'] == 1){
       $query = "SELECT * FROM `doc_reg` WHERE doctorId = $doctorId";
       $result = mysqli_query($con,$query);
      }else if($_GET['status'] == 2)
      {
        $query = "SELECT * FROM `doc_on_call` WHERE doctorId = $doctorId";
        $result = mysqli_query($con,$sql);
      }
      $res = mysqli_fetch_array($result);
  ?>
    <div class="container-fluid">
      <form action="" method="POST">
        <h2>Update Doctor Record</h2>
        <br />
        <div class="form-row col-md-12">
          <div class="form-group col-md-3">
            <input type="text" class="form-control" value="<?php echo $_GET['doctorStatus']; ?>" readonly >
          </div>
          <div class="col-md-2 pull-right">
            <a href="ShowDocRec.php"
              ><button type="button" class="btn btn-success">
                View Doctor Record
              </button></a
            >
          </div>
        </div>

        <!-- Regular Doctor -->
        <div>
          <div class="form-row">
            <div class="form-group col-md-6">
              <label for="doctorName">Doctor Name</label>
              <input
                type="text"
                class="form-control"
                id="doctorName"
                name="doctorName"
                value="<?php echo $res['doctorName']; ?>"
              />
            </div>

            <div class="form-group col-md-6">
              <label for="qualification">Qualification</label>
              <input
                type="text"
                class="form-control"
                id="qualification"
                name="qualification"
                value="<?php echo $res['qualification']; ?>"
              />
            </div>
          </div>
          <div class="form-row">
            <div class="form-group col-md-8">
              <label for="address">Address</label>
              <input
                type="text"
                class="form-control"
                id="address"
                name="address"
                value="<?php echo $res['address']; ?>"
              />
            </div>
            <div class="form-group col-md-4">
              <label for="phoneNumber">Phone Number</label>
              <input
                type="text"
                class="form-control"
                id="phoneNumber"
                name="phoneNumber"
                value="<?php echo $res['phoneNumber']; ?>"

              />
            </div>
          </div>
        </div>

          <div class="form-row" id="regular">
            <div class="form-group col-md-4">
              <label for="joiningDate">Date of Joining</label>
              <input
                type="date"
                class="form-control"
                id="joiningDate"
                name="joiningDate"
                value="<?php echo $res['joiningDate']?>"
              />
            </div>
            <div class="form-group col-md-2">
              <label for="salary">Salary</label>
              <input
                type="number"
                class="form-control"
                id="salary"
                name="salary"
                value="<?php echo $res['salary']?>"
              />
            </div>
          </div>
        <!--Doctor On Call  -->
        <!-- <div id="onCall">
            <div class="form-group col-md-4">
              <label for="paymentDue">Payment Due</label>
              <input
                type="number"
                class="form-control"
                id="paymentDue"
                name="paymentDue"
              />
            </div>
            <div class="form-group col-md-2">
              <label for="FPC2">Fee Per Call</label>
              <input
                type="number"
                class="form-control"
                id="FPC"
                name="feePerCall"
              />
            </div>
          </div> -->
       
        
        

        <div class="form-row col-md-12" style="padding-left: 1.5%">
          <button
            type="submit"
            class="btn btn-success form-group col-md-1 align-self-start"
            name="submit"
          >
            Submit
          </button>
        </div>
      </form>
    </div>
  </body>
</html>
