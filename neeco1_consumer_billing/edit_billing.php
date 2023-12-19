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

$select = mysqli_query ($conn, "SELECT * FROM billing WHERE id = '$id'");
	while ($row = mysqli_fetch_array($select))
	{
		$id = $row['id'];
		$billing_number = $row['billing_number'];
        $account_number = $row['account_number']; 
        $billing_month = $row['billing_month']; 
        $reading_date = $row['reading_date']; 
        $due_date = $row['due_date']; 
        $previous_reading = $row['previous_reading']; 
        $present_reading = $row['present_reading']; 
        $kwh_used = $row['kwh_used']; 
        $penalty = $row['penalty']; 
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

    <h1>Registration Form</h1><br>
        <form action="edit.php" method="post">
        <div class="form-group">
                <input hidden type="hide" value = "<?php echo $id ?>" class="form-control" name="id" placeholder="ID:" >
            </div>
        <div class="form-group">
                <input hidden type="number" value = "<?php echo $billing_number ?>" class="form-control" name="billing_number" placeholder="Billing number:">
            </div>
            <div class="form-group">
                <input type="number" value = "<?php echo $account_number ?>" class="form-control" name="account_number" placeholder="Account number:" required>
            </div>
            <div class="form-group">
                <input type="number" value = "<?php echo $billing_month ?>" class="form-control" name="billing_month" placeholder="Billing month:" required>
            </div>
            <div class="form-group">
            <p1>Reading Date: </p1>
                <input type="date" value = "<?php echo $reading_date ?>" class="form-control" name="reading_date" placeholder="Reading date:" required>
            </div>
            <div class="form-group">
            <p1>Due Date: </p1>
                <input type="date" value = "<?php echo $due_date ?>" class="form-control" name="due_date" placeholder="Due Date:">
            </div>
            <div class="form-group">
                <input type="number" value = "<?php echo $previous_reading ?>" class="form-control" name="previous_reading" placeholder="Previous Reading:" required>
            </div>
            <div class="form-group">
                <input type="number" value = "<?php echo $present_reading ?>" class="form-control" name="present_reading" placeholder="Present Reading:">
            </div>
            <div class="form-group">
                <input type="number" value = "<?php echo $kwh_used ?>" class="form-control" name="kwh_used" placeholder="Kwh used:">
            </div>
            <div class="form-group">
                <input hidden type="text" value = "<?php echo $penalty ?>" class="form-control" name="penalty" placeholder="Penalty:" >
            </div>
            <div class="form-btn">
                <input type="submit" class="btn btn-success" value="Submit" name="submit">
            </div>
        </form>
        <div>
        <div><p>Go back to table <a href="billing_table.php" class="text-success border border-success rounded-1 text-decoration-none">Click Here</a></p></div>
      </div>
    </div>
</body>
</html>