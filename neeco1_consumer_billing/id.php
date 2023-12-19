<?php
include "include.php";
?>
<?php
session_start();
if (!isset($_SESSION["user_name"])) {
    header("Location: admin.php");
 }
?>
<?php
$id = $_GET['id'];

$select = mysqli_query ($conn, "SELECT * FROM consumer WHERE id = '$id'");
	while ($row = mysqli_fetch_array($select))
	{
		$id = $row['id'];
		$account_number = $row['account_number'];
        $first_name = $row['first_name']; 
        $last_name = $row['last_name']; 
        $middle_name = $row['middle_name']; 
        $con_address = $row['con_address']; 
        $district = $row['district']; 
        $contact_number = $row['contact_number']; 
        $consumer_type = $row['consumer_type']; 
        $meter_number = $row['meter_number']; 
        $previous_reading = $row['previous_reading']; 
        $con_status = $row['con_status'];  
	}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration Form</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <div class="container">

<h1>Editing Form</h1><br>
        <form action="edit.php" method="post">
		<div class="form-group">
                <input hidden type="hide" value = "<?php echo $id ?>" class="form-control" name="id" placeholder="ID:" >
            </div>
            <div class="form-group">
                <input type="number" value = "<?php echo $account_number ?>" class="form-control" name="account_number" placeholder="Account number:" required>
            </div>
            <div class="form-group">
                <input type="text" value = "<?php echo $first_name ?>" class="form-control" name="first_name" placeholder="First Name:" required>
            </div>
            <div class="form-group">
                <input type="text"  value = "<?php echo $last_name ?>" class="form-control" name="last_name" placeholder="Last Name:" required>
            </div>
            <div class="form-group">
                <input type="text" value = "<?php echo $middle_name ?>" class="form-control" name="middle_name" placeholder="Middle Name:">
            </div>
            <div class="form-group">
                <input type="text" value = "<?php echo $con_address ?>" min="0" max="3" class="form-control" name="con_address" placeholder="Address:" required>
            </div>
            <div class="form-group">
                <input type="number" value = "<?php echo $district ?>" class="form-control" name="district" placeholder="District:" required>
            </div>
            <div class="form-group">
                <input type="number" value = "<?php echo $contact_number ?>" class="form-control" name="contact_number" placeholder="Contact number:">
            </div>
            <div class="form-group">
                <input type="text" value = "<?php echo $consumer_type ?>" class="form-control" name="consumer_type" placeholder="Consumer type:">
            </div>
            <div class="form-group">
                <input type="number" value = "<?php echo $meter_number ?>" class="form-control" name="meter_number" placeholder="Meter NO:">
            </div>
            <div class="form-group">
                <input type="number" value = "<?php echo $previous_reading ?>" class="form-control" name="previous_reading" placeholder="Previous Reading:">
            </div>
            <div class="form-group">
                <input type="text" value = "<?php echo $con_status ?>" class="form-control" name="con_status" placeholder="Status:" >
            </div>
            <div class="form-btn">
                <input type="submit" class="btn btn-success" value="Edit" name="submit">
            </div>
        </form>
        <div>
        <div><p>Go back to table <a href="consumer_list.php" class="text-success border border-success rounded-1 text-decoration-none">Click Here</a></p></div>
      </div>
    </div>
</body>
</html>