<?php
session_start();
if (!isset($_SESSION["user_name"])) {
    header("Location: admin.php");
 }
?>
    <?php
           $account_number  = $_POST["account_number"];
           $first_name = $_POST["first_name"];
           $last_name = $_POST["last_name"];
           $middle_name = $_POST["middle_name"];
           $con_address = $_POST["con_address"];
           $district = $_POST["district"];
           $contact_number = $_POST["contact_number"];
           $consumer_type = $_POST["consumer_type"];
           $meter_number = $_POST["meter_number"];
           $previous_reading = $_POST["previous_reading"];
           $con_status = $_POST["con_status"];
           
           $errors = array();

           require_once "include.php";
           $sql = "SELECT * FROM consumer WHERE account_number = '$account_number'";
           $result = mysqli_query($conn, $sql);
           $rowCount = mysqli_num_rows($result);
           
           if ($rowCount > 0) {
               array_push($errors);
	            echo '<script> alert("Account Number already registered");
	            window.location="consumer_list.php";
	            </script>';
                die ();
           }
           if(count($errors)>0){
            foreach ($errors as $error){
                echo "<div class='alert alert-danger'>$error</div>";
            }
           }
           else {
               $sql = "INSERT INTO consumer (account_number, first_name, last_name, middle_name, con_address, 
               district, contact_number, consumer_type, meter_number, previous_reading, con_status) 
                       VALUES ('$account_number', '$first_name', '$last_name', '$middle_name', 
                       '$con_address', '$district', '$contact_number', '$consumer_type', '$meter_number', 
                       '$previous_reading', '$con_status')";

               if (mysqli_query($conn, $sql)) {
                echo '<script> alert("Data added successfully");
                window.location="consumer_list.php";
                </script>';
               } else {
                echo '<script> alert("Error Adding Data. Try Again");
                window.location="consumer_list.php";
                </script>';
               }
           }
        ?>