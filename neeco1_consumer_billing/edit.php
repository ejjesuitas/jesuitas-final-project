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

		$id = $_POST['id'];
		$account_number = $_POST['account_number'];
        $first_name = $_POST['first_name'];
        $last_name = $_POST['last_name'];
        $middle_name = $_POST['middle_name'];
        $con_address = $_POST['con_address'];
        $district = $_POST['district'];
        $contact_number = $_POST['contact_number'];
        $consumer_type = $_POST['consumer_type'];
        $meter_number = $_POST['meter_number'];
        $previous_reading = $_POST['previous_reading'];
        $con_status = $_POST['con_status'];

$update = mysqli_query($conn, "UPDATE consumer SET account_number = '$account_number',
            first_name = '$first_name',
            last_name = '$last_name',
            middle_name = '$middle_name',
            con_address = '$con_address',
            district = '$district',
            contact_number = '$contact_number',
            consumer_type = '$consumer_type',
            meter_number = '$meter_number',
            previous_reading = '$previous_reading',
            con_status = '$con_status'
            WHERE id = '$id'");

if ($update === true)
{
	echo '<script> alert("Data edited successfully");
	window.location="consumer_list.php";
	</script>';
}
else
{
	echo 'Error updating';
}
?>