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

$drop = mysqli_query($conn, "DELETE FROM billing WHERE id = '$id'");

if($drop === true)
{
	echo '<script> alert("Bill information has been deleted");
	window.location="billing_table.php";
	</script>';
}
else 
{
	echo 'error deleting data' . mysqli_error($conn);
}
?>