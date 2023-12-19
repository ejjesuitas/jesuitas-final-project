<?php
include "include.php";
session_start();

$username  = $_POST['user_name'];
$password  = $_POST['admin_password'];

$sql = mysqli_query($conn,"SELECT * FROM user_info WHERE user_name = '$username' AND admin_password = '$password'");
$get_row = mysqli_fetch_array($sql);

if(is_array($get_row))
{
  //echo $get_row['userid'] . $get_row['firstname'] . "<br>"; // Testing if $get_row works
  $_SESSION['username'] = $get_row['user_name'];
 // echo $_SESSION['userid'] . $get_row['firstname'] . "<br>"; // Testing if $_SESSION['userid'] works
  $_SESSION['password'] = $get_row['admin_password'];
  //echo $_SESSION['password'] . "<br>"; // Testing if $_SESSION['password'] works
  //$_SESSION['data'] = $get_row;
  $_SESSION['admin_name'] = $get_row['admin_name'];
  echo $_SESSION['admin_name']; // Testing if $_SESSION['admin_name'] works
  header("consumer_list.php");
} else
{
 // echo '<script>
  //alert("Incorrect Credentials, Please Try Again.");
  //window.location="admin.php";
  //</script>';
}
// if(isset($_SESSION['userid']))
// {
//   
//   exit();
// }
?>