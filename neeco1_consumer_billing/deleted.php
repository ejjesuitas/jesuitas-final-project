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

$drop = mysqli_query($conn, "DELETE FROM consumer WHERE id = '$id'");

if($drop === true)
{
	echo '<script> alert("Consumer has been deleted");
	window.location="consumer_list.php";
	</script>';
}
else 
{
	echo 'error deleting data' . mysqli_error($conn);
}
?>