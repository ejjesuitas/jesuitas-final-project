<?php
include "include.php";
session_start();


if ($_SERVER["REQUEST_METHOD"]=="POST") 
{
  $user_name=$_POST['user_name'];
  $admin_password = $_POST['admin_password'];
  $admin_name = $_POST['admin_name'];

  $sql = mysqli_query($conn, "SELECT * FROM user_info WHERE user_name = '$user_name' AND admin_password = '$admin_password'");
  $get_row = mysqli_fetch_array($sql);

  if($get_row['position']=='admin')
  {
    $_SESSION['user_name'] = $get_row['admin_name'];
    $_SESSION['admin_password'] = $get_row['admin_password'];
    $_SESSION['admin_name'] = $get_row['admin_name'];
   header("Location: consumer_list.php");
  } else{
    echo '<script> alert("Incorrect credentials. Try Again :)");
    window.location="admin.php";
    </script>';
 }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Login Form</title>
    <style>
        body{
            position: absolute;
  top: 50%;
  left: 50%;
  transform: translate(-50%,-50%);
        }
    .form {
  background-color: #fff;
  display: block;
  padding: 1rem;
  max-width: 350px;
  border-radius: 0.5rem;
  box-shadow: 0 10px 15px -3px rgba(0, 0, 0, 0.1), 0 4px 6px -2px rgba(0, 0, 0, 0.05);
}

.form-title {
  font-size: 1.25rem;
  line-height: 1.75rem;
  font-weight: 600;
  text-align: center;
  color: #000;
}

.input-container {
  position: relative;
}

.input-container input, .form button {
  outline: none;
  border: 1px solid #e5e7eb;
  margin: 8px 0;
}

.input-container input {
  background-color: #fff;
  padding: 1rem;
  padding-right: 3rem;
  font-size: 0.875rem;
  line-height: 1.25rem;
  width: 300px;
  border-radius: 0.5rem;
  box-shadow: 0 1px 2px 0 rgba(0, 0, 0, 0.05);
}

.input-container span {
  display: grid;
  position: absolute;
  top: 0;
  bottom: 0;
  right: 0;
  padding-left: 1rem;
  padding-right: 1rem;
  place-content: center;
}

.input-container span svg {
  color: #9CA3AF;
  width: 1rem;
  height: 1rem;
}

.submit {
  display: block;
  padding-top: 0.75rem;
  padding-bottom: 0.75rem;
  padding-left: 1.25rem;
  padding-right: 1.25rem;
  background-color: #4F46E5;
  color: #ffffff;
  font-size: 0.875rem;
  line-height: 1.25rem;
  font-weight: 500;
  width: 100%;
  border-radius: 0.5rem;
  text-transform: uppercase;
  cursor: pointer;
}

.signup-link {
  color: #6B7280;
  font-size: 0.875rem;
  line-height: 1.25rem;
  text-align: center;
}

.signup-link a {
  text-decoration: underline;
}

        </style>
</head>
<body>
    <div>
<form class="form" action="admin.php" method="post">
       <p class="form-title">Sign in to your account</p>
        <div class="input-container">
          <input placeholder="Enter USER ID:" id="user_name" type="text" name="user_name">
      </div>
      <div class="input-container">
          <input placeholder="Enter password :" id="admin_password" type="password" name="admin_password">
      </div>
         <button class="submit" type="submit" name="login">
        Sign in
      </button>
   </form>
</body>

</html>